/**
 *
 * Created by macseem on 2/24/15.
 */

/**
 *
  * @param jQuery $
 * @param json
 * @constructor
 */
var Breed = function($,json){

};
Breed.editFormSubmit = function(data) {
    $.ajax({
        url: json.apiUrl + '/',
        method: 'post',
        data:data,
        success: function(response) {
            if(response == 'OK')
                return;
            alert('Error in Success');
        },
        error: function(response) {
            alert('Error in Error');
        }
    });
};


