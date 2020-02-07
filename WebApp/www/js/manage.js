window.addEventListener('DOMContentLoaded', function() {
    
    var deleteElements = document.querySelectorAll('[data-username]');

    console.log(deleteElements);

    for(var i=0; i<deleteElements.length; i++) {

        //console.log(deleteElements[i].dataset.username);

        deleteElements[i].addEventListener('click', function() {
            
            var username = this.dataset.username;

            var toDelete = this;

            if(confirm('Delete ' + username + ' ?')) {
                
                var ajx = new XMLHttpRequest();

                var params = 'username=' + username;

                ajx.open('POST', 'form_user_delete_save.php', true);

                ajx.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                ajx.onload = function () {
                    
                    if(this.status === 200) {

                        //console.log(this.responseText);

                        if(this.responseText == '1') {
                            alert(username + ' deleted successfuly');
                            document.location.reload();
                        }
                        else if(this.responseText == '2') {
                            alert(username + ' not deleted: this is your account !!');
                        }
                        else {
                            alert('Deletion failed !');
                        }

                    }

                };

                ajx.send(params);
            }
        });

    } // for deleteItems

    document.querySelector("#passwordShow").addEventListener('click', function() {
        var p = document.querySelector("#passwordField");
        p.type = (p.type === 'password') ? 'text' : 'password';
    });



});

