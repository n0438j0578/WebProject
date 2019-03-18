
var request = require('request');
request.post(
    'http://35.198.240.228:20000/api/wordcome ',
    { json: {
        "text":"มีสินค้าที่เกี่ยวกับ D-Link ไหม"
    } },
    function (error, response, body) {
        if (!error && response.statusCode == 200) {
            console.log(body)
            console.log(body.Product[0].Name)
            //console.log(body.Answer.Img)
        }
    }
);