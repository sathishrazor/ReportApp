function toUrlEncoded(obj) {
    var temp = Object.keys(obj).map(function (k) {
        return encodeURIComponent(k) + '=' + encodeURIComponent(obj[k])
    });
    return temp.join('&');
}
