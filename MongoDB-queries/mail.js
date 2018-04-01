db.mails.aggregate([

    { "$match": { "headers.To": "ebass@enron.com" } },

    {
        "$group": {

            _id: {

                $substr: ["$headers.Date", 0, 3]

            }

            ,

            count: { $sum: 1 }

        }

    }

])