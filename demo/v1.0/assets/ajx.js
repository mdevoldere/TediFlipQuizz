class Ajx
{
    static get(_url, _callback, _asJson = false) {

        try {
            _url = _url.trim();

            console.log("Loading "+ _url +"...");

            var ajx = new XMLHttpRequest();

            ajx.open('GET', _url, true);

            ajx.onload = function() {
                if (this.status === 200) {
                    result = ((_asJson === false) ? this.responseText : JSON.parse(this.responseText)); 
                    console.log(result);
                    console.log("Loaded "+ _url +" !");
                    callbackGateway(_callback, result);          
                 }
                 else {
                     console.error("AjxLoad Error. " + this.status + ": " + this.statusText);
                 }
            };
      
            ajx.send();
        }
        catch(e) {
            console.error(e);
        }
    }

    static callbackGateway(_callback, _response) {
        _callback(_response);
    }

    static getJson(_url, _callback) {
        Ajx.get(_url, _callback, true);
    }

    static getJsonData(_filename, _callback) {
        Ajx.get('./data/'+ _filename.trim() +'.json', _callback, true);
    }

    static getHtml(_url, _callback) {
        Ajx.get(_url, _callback, false);
    }

    static getView(_filename, _callback) {
        Ajx.get('./views/'+ _filename.trim() +'.html', _callback, false);
    }
}