window.addEventListener('DOMContentLoaded', function() {
    
    var deleteElements = document.querySelectorAll('[data-username]');

    console.log(deleteElements);

    for(var i=0; i<deleteElements.length; i++) {

        //console.log(deleteElements[i].dataset.username);

        deleteElements[i].addEventListener('click', function() {
            
            var username = this.dataset.username;

            if(confirm('Delete ' + username + ' ?')) {
                
                var ajx = new XMLHttpRequest();

                var params = 'username=' + username;

                ajx.open('POST', 'form_user_delete_save.php', true);

                ajx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                ajx.onload = function () {
                    
                    if(this.status === 200) {

                        //console.log(this.responseText);

                        if(this.responseText == '1') {
                            alert('Suppression effectuée');
                        }
                        else {
                            alert('Echec de la suppression');
                        }

                    }

                };

                ajx.send(params);
            }
        });

        

    }

});

