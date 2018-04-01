const express = require('express');
const twig = require('twig');
const bodyParser = require('body-parser');
const mysqlModel = require('mysql-model');
const format = require('string-format');
const multer = require('multer');
const path = require('path')
const fs = require('fs')
const formidable = require('formidable')
const readChunk = require('read-chunk')
const fileType = require('file-type')

const itemImgFolder = '/media/'; //for twig
const itemImgPathDB = '/item_pics/'; //for db
const uploadFolder = './public/' + itemImgFolder + itemImgPathDB; // for file uploads

const storage = multer.diskStorage({
    destination: function (req, file, callback) {
        callback(null, uploadFolder)
    },
    filename: function (req, file, callback) {
        callback(null, Date.now() + '_' + file.originalname)
    }
})

const upload = multer({
    storage: storage
})

const app = express();

app.use(express.static(__dirname + '/public'));
app.use('/uploads', express.static('uploads'));
app.engine('html', twig.renderFile);

app.set('view engine', 'html');
app.set('views', __dirname + '/views');

app.use(bodyParser.urlencoded({ extended: false }));
app.use(bodyParser.json());

format.extend(String.prototype)

const carAppModel = mysqlModel.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'spec_car_tech'
});

const Car = carAppModel.extend({
    tableName: 'car',
});

const Mark = carAppModel.extend({
    tableName: 'mark',
});

const Category = carAppModel.extend({
    tableName: 'category',
});

const Modification = carAppModel.extend({
    tableName: 'modification',
});

const Charvalue = carAppModel.extend({
    tableName: 'characteristicvalue',
});

const Charname = carAppModel.extend({
    tableName: 'characteristicname',
});

function mysql_real_escape_string(str) {
    if (typeof str != 'string')
        return str;

    return str.replace(/[\0\x08\x09\x1a\n\r"'\\\%]/g, function (char) {
        switch (char) {
            case "\0":
                return "\\0";
            case "\x08":
                return "\\b";
            case "\x09":
                return "\\t";
            case "\x1a":
                return "\\z";
            case "\n":
                return "\\n";
            case "\r":
                return "\\r";
            case "\"":
            case "'":
            case "\\":
            case "%":
                return "\\" + char; // prepends a backslash to backslash, percent,
            // and double/single quotes
        }
    });
}

//Done
app.get('/', (req, res) => {
    car = new Car();
    car.find('all', (err, cars) => {
        res.render('index.twig', { cars: cars, img_folder: itemImgFolder });
    });
});

//Done
app.get('/car/:id', (req, res) => {
    car = new Car();
    modification = new Modification();
    car.find('first', { where: "ID = {0}".format(req.params.id) }, (err, car) => {
        modification.query("SELECT\
        characteristicvalue.value as value,\
        characteristicvalue.unit as unit,\
        characteristicname.name as name\
        FROM modification\
        INNER JOIN car\
            ON modification.ID_car = car.ID\
        INNER JOIN characteristicvalue\
            ON characteristicvalue.ID_modification = modification.ID\
        INNER JOIN characteristicname\
            ON characteristicvalue.ID_char_name = characteristicname.ID\
        WHERE car.ID = {0}".format(req.params.id), (err, modification) => {


                res.render('item-page.twig', {
                    car: car,
                    img_folder: itemImgFolder,
                    mods: modification
                });
            });
    });
});

//Done
app.get('/edit/car/:id', (req, res) => {
    car = new Car();
    marks = new Mark();
    categories = new Category();
    modification = new Modification();
    characterisricName = new Charname();
    pageName = 'Редактирование';
    btnName = 'Сохранить';
    car.find('first', { where: "ID = {0}".format(req.params.id) }, (err, car) => {
        marks.find('all', (err, marks) => {
            categories.find('all', (err, categories) => {
                modification.query("SELECT\
        characteristicvalue.value as value,\
        characteristicvalue.unit as unit,\
        characteristicname.name as name\
        FROM modification\
        INNER JOIN car\
            ON modification.ID_car = car.ID\
        INNER JOIN characteristicvalue\
            ON characteristicvalue.ID_modification = modification.ID\
        INNER JOIN characteristicname\
            ON characteristicvalue.ID_char_name = characteristicname.ID\
        WHERE car.ID = {0}".format(req.params.id), (err, exist_mods) => {

                        characterisricName.find('all', (err, charNames) => {
                            res.render('edit-page.twig', {
                                car: car,
                                marks: marks,
                                categories: categories,
                                img_folder: itemImgFolder,
                                pageName: pageName,
                                btnName: btnName,
                                exist_mods: exist_mods,
                                mods: charNames

                            });
                        });

                    })
            });
        });
    });
});


app.post('/edit/car/:id', upload.single('img_path'), (req, res) => {


    name = req.body.name;
    ID_mark = req.body.mark;
    ID_category = req.body.category;

    if (req.file) {
        newImgPath = req.file.path.replace("public", "").replace("media", "");

        car = new Car();
        car.query("UPDATE car set img_path = '{0}'and name = '{1}'and ID_mark = '{2}' and ID_category = '{3}' WHERE ID = {4}".format(mysql_real_escape_string(newImgPath), req.body.name, req.body.mark, req.body.category, req.params.id), (err, car) => {

        });
    } else {
        car = new Car();
        car.query("UPDATE car set name = '{0}'and ID_mark = '{1}' and ID_category = '{2}' WHERE ID = {3}".format(req.body.name, req.body.mark, req.body.category, req.params.id), (err, car) => {

        });
    }


    modification = new Modification();
    charVal = new Charvalue();
    charName = new Charname();
    modification.find('first', { where: "ID_car = {0}".format(req.params.id) }, (err, modification) => {
        charVal.find('all', { where: "ID_modification = {0}".format(modification.ID) }, (err, charVal) => {
            charName.find('all', (err, charName) => {

                for (let char_id of charName) {

                    var new_val = req.body[char_id.ID];


                    if (new_val) {
                        var update = false;
                        for (let char_value of charVal) {
                            if (char_value.ID_char_name == char_id.ID) {
                                update = true;
                                break;
                            }
                        }
                        if (update) {

                            updateCharVal = new Charvalue();
                            updateCharVal.query("UPDATE characteristicvalue set value={0} WHERE ID_char_name = {1} and ID_modification = {2}".format(new_val, char_id.ID, modification.ID), (err, updateCharVal) => {

                            });

                        } else {
                            newCharVal = new Charvalue({
                                ID_modification: modification.ID,
                                value: new_val,
                                ID_char_name: char_id.ID
                            });
                            newCharVal.save();


                        }
                    }

                }
            });
        });
    });
    res.redirect('/car/{0}'.format(req.params.id));
});

//Done
app.get('/add', (req, res) => {
    marks = new Mark();
    categories = new Category();
    characterisricName = new Charname();
    pageName = 'Добавление';
    btnName = 'Добавить';


    marks.find('all', (err, marks) => {
        categories.find('all', (err, categories) => {
            characterisricName.find('all', (err, charNames) => {
                console.log(charNames);

                res.render('edit-page.twig', {
                    marks: marks,
                    categories: categories,
                    img_folder: itemImgFolder,
                    pageName: pageName,
                    btnName: btnName,
                    mods: charNames

                });
            });
        });
    });
});

//Done
app.post('/add', upload.single('img_path'), (req, res) => {

    newImgPath = req.file.path.replace("public", "").replace("media", "");
    car = new Car({
        name: req.body.name,
        ID_mark: req.body.mark,
        ID_category: req.body.category,
        img_path: newImgPath
    });
    car.save((err, res) => {
        newCarID = res.insertId;

        modification = new Modification({
            name: 'Модификация для ' + req.body.name,
            ID_car: newCarID
        });

        modification.save((err, res) => {
            newModId = res.insertId;

            characterisricName = new Charname();
            characterisricName.find('all', (err, characterisricName) => {
                for (let char_id of characterisricName) {
                    new_val = req.body[char_id.ID];
                    if (!!new_val) {
                        charVal = new Charvalue({
                            ID_modification: newModId,
                            ID_char_name: char_id.ID,
                            value: new_val
                        });
                        charVal.save();
                    }

                }
            })

        });


    });

    res.redirect('/');
});


//DONE
app.get('/admin', (req, res) => {
    car = new Car();
    car.find('all', (err, cars) => {
        res.render('admin-page.twig', { cars: cars, img_folder: itemImgFolder });
    });
});

//done
app.get('/delete/car/:id', (req, res) => {
    car = new Car();
    car.set('id', req.params.id);
    console.log(car);
    car.remove();
    res.redirect('/admin');
});

app.post('/upload_photos', function (req, res) {
    var photos = [],
        form = new formidable.IncomingForm();

    // Tells formidable that there will be multiple files sent.
    form.multiples = true;
    // Upload directory for the images
    form.uploadDir = path.join(__dirname, 'tmp_uploads');

    // Invoked when a file has finished uploading.
    form.on('file', function (name, file) {
        // Allow only 3 files to be uploaded.
        if (photos.length === 3) {
            fs.unlink(file.path);
            return true;
        }

        var buffer = null,
            type = null,
            filename = '';

        // Read a chunk of the file.
        buffer = readChunk.sync(file.path, 0, 262);
        // Get the file type using the buffer read using read-chunk
        type = fileType(buffer);

        // Check the file type, must be either png,jpg or jpeg
        if (type !== null && (type.ext === 'png' || type.ext === 'jpg' || type.ext === 'jpeg')) {
            // Assign new file name
            filename = Date.now() + '-' + file.name;

            // Move the file with the new file name
            fs.rename(file.path, path.join(__dirname, 'uploads/' + filename));

            // Add to the list of photos
            photos.push({
                status: true,
                filename: filename,
                type: type.ext,
                publicPath: 'uploads/' + filename
            });
        } else {
            photos.push({
                status: false,
                filename: file.name,
                message: 'Invalid file type'
            });
            fs.unlink(file.path);
        }
    });

    form.on('error', function (err) {
        console.log('Error occurred during processing - ' + err);
    });

    // Invoked when all the fields have been processed.
    form.on('end', function () {
        console.log('All the request fields have been processed.');
    });

    // Parse the incoming form fields.
    form.parse(req, function (err, fields, files) {
        res.status(200).json(photos);
    });
});


var listener = app.listen(69, '127.0.0.1', () => {
    console.log('Started server on ' + listener.address().address + ':' + listener.address().port);
});
