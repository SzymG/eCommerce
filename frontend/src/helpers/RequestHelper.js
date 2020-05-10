const backendUrl = 'http://localhost/eCommerce/backend/';

export const fetchData = (method, url, body = "") => {
    url = backendUrl + 'product/' + url;
    return new Promise((resolve, reject) => {
        let requestHandler = new XMLHttpRequest();
        requestHandler.open(method, url, true);
        requestHandler.withCredentials = true;
        requestHandler.setRequestHeader("Content-Type", "application/json");
        requestHandler.setRequestHeader("Access-Control-Allow-Methods", method);

        requestHandler.onload = function () {
            if (this.status >= 200 && this.status < 300) {
                resolve(JSON.parse(requestHandler.response));
            } else {
                reject({
                    status: this.status,
                    statusText: requestHandler.responseText
                });
            }
        };

        requestHandler.onerror = function () {
            reject({
                status: this.status,
                statusText: requestHandler.responseText
            })
        };
        requestHandler.send(JSON.stringify(body));
    })
};