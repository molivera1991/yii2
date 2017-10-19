<?php
/**
* @api {post} /tallerphpyiiadvanced/api/v1/countries  tallerphpyiiadvanced api countries
* @apiName postTallerphpyiiadvancedApiCountries
* @apiGroup Country
* @apiVersion 1.0.0
* @apiParam {string} code El codigo del pais
* @apiParam {string} name
* @apiParam {integer} population
* @apiParam {string} flag_img
* @apiSuccess {string} code
* @apiSuccess {string} name
* @apiSuccess {integer} population
* @apiSuccess {string} flag_img
* @apiSuccess {integer} id
* @apiSuccessExample {json} JSON success response EXAMPLE:
* HTTP/1.1 200 OK
*{
 *    "code": "CR",
 *    "name": "Costa Rica",
 *    "population": 223232,
 *    "flag_img": "fsdafasf",
 *    "id": 12
 *}
*/
