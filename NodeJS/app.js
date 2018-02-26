
const express = require('express');
const twig = require('twig');
const bodyParser = require('body-parser');
const mysqlModel = require('mysql-model');
const format = require('string-format');
const multer = require('multer');
const path = require('path')

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
app.engine('html', twig.renderFile);

app.set('view engine', 'html');
app.set('views', __dirname + '/views');

app.use(bodyParser.urlencoded({ extended: true }));
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

app.get('/', function (req, res) {
    car = new Car();
    car.find('all', (err, cars) => {
        res.render('index.twig', { cars: cars, img_folder: itemImgFolder });
    });
});

app.get('/car/:id', function (req, res) {
    car = new Car();
    car.find('first', { where: "ID = {0}".format(req.params.id) }, (err, car) => {
        res.render('item-page.twig', {
            car: car,
            img_folder: itemImgFolder
        });
    });
});

app.get('/edit/car/:id', function (req, res) {
    car = new Car();
    marks = new Mark();
    categories = new Category();
    pageName = 'Редактирование';
    btnName = 'Сохранить';
    car.find('first', { where: "ID = {0}".format(req.params.id) }, (err, car) => {
        marks.find('all', (err, marks) => {
            categories.find('all', (err, categories) => {
                res.render('edit-page.twig', {
                    car: car,
                    marks: marks,
                    categories: categories,
                    img_folder: itemImgFolder,
                    pageName: pageName,
                    btnName: btnName
                });
            })
        });
    });
});

app.post('/edit/car/:id', function (req, res) {

});

app.get('/add', function (req, res) {
    marks = new Mark();
    categories = new Category();
    pageName = 'Добавление';
    btnName = 'Добавить';

    marks.find('all', (err, marks) => {
        categories.find('all', (err, categories) => {
            res.render('edit-page.twig', {
                marks: marks,
                categories: categories,
                pageName: pageName,
                btnName: btnName
            });
        })
    });
});

app.post('/add', upload.single('img_path'), function (req, res) {
    newImgPath = req.file.path.replace("public", "").replace("media", "");
    car = new Car({
        name: req.body.name,
        ID_mark: req.body.mark,
        ID_category: req.body.category,
        img_path: newImgPath
    });
    car.save((err, res) => {
        newCarID = res.insertId;

    });

    res.redirect('/');
});



app.listen(228);