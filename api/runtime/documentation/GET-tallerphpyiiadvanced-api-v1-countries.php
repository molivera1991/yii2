<?php
/**
* @api {get} /tallerphpyiiadvanced/api/v1/countries  tallerphpyiiadvanced api countries
* @apiName getTallerphpyiiadvancedApiCountries
* @apiGroup Country
* @apiVersion 1.0.0
* @apiSuccess {integer} id
* @apiSuccess {string} code
* @apiSuccess {string} name
* @apiSuccess {integer} population
* @apiSuccess {string} flag_img
* @apiSuccessExample {json} JSON success response EXAMPLE:
* HTTP/1.1 200 OK
*[
 *    {
 *        "id": 1,
 *        "code": "UY",
 *        "name": "Uruguay",
 *        "population": 23232,
 *        "flag_img": "https:\/\/thumb9.shutterstock.com\/display_pic_with_logo\/599386\/599386,1277646158,2\/stock-photo--d-ball-with-uruguay-flag-56042110.jpg"
 *    },
 *    {
 *        "id": 8,
 *        "code": "NZ",
 *        "name": "New Zeland 22",
 *        "population": 223232,
 *        "flag_img": "Flag"
 *    },
 *    {
 *        "id": 9,
 *        "code": "AR",
 *        "name": "Argentina",
 *        "flag_img": "fsdafasf"
 *    },
 *    {
 *        "id": 10,
 *        "code": "CL",
 *        "name": "Chile",
 *        "id": 11,
 *        "code": "CO",
 *        "name": "Colombia",
 *    }
 *]
 * @apiSuccessExample {json} JSON success response:
 * HTTP/1.1 404 NotFound
 *[
 *]
* @apiError {boolean} success
* @apiError {integer} code
* @apiError {string} status
* @apiError {array} data
* @apiError {string} data.name
* @apiError {string} data.message
* @apiError {integer} data.code
* @apiError {integer} data.status
* @apiError {string} data.type
* @apiErrorExample {json} JSON error response EXAMPLE:
* HTTP/1.1 404 Not Found
*{
 *    "success": false,
 *    "code": 404,
 *    "status": "Not Found",
 *    "data": {
 *        "name": "Not Found",
 *        "message": "Can not dislike on product that has no like",
 *        "code": 0,
 *        "status": 404,
 *        "type": "yii\\web\\HttpException"
 *    }
 *}
*/

