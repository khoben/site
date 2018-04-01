DBQuery.shellBatchSize = 500;
db.plays.aggregate([
    { $unwind: "$acts" },
    { $unwind: "$acts.scenes" },
    { $unwind: "$acts.scenes.action" },
    {
        $project:
            {
                "_id": 1,
                "character": "$acts.scenes.action.character"
            }
    },
    {
        $group: {
            _id: "$_id",
            characters: { $addToSet: "$character" }
        }
    },
    { $unwind: "$characters" },
    { $sort: { "characters": 1 } },
    {
        $group: {
            _id: "$_id",
            characters: { $push: "$characters" }
        }
    },
])
