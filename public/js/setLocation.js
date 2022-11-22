function setLocation(position) {
    const lat = position.coords.latitude;   // 縦の緯度
    const lng = position.coords.longitude;  // 横の経度

    console.log(lat);
    console.log(lng);

    $("#lat_value").val(lat);
    $("#lng_value").val(lng);
}

function showErr(err) {
    switch (err.code) {
        case 1:
            alert("位置情報の利用が許可されていません");
            break;
        case 2:
            alert("デバイスの位置が判定できません");
            break;
        case 3:
            alert("タイムアウトしました");
            break;
        default:
            alert(err.message);
    }
}

if ("geolocation" in navigator) {
    var opt = {
        "enableHighAccuracy": true,
        "timeout": 10000,
        "maximumAge": 0
    };
    navigator.geolocation.getCurrentPosition(setLocation, showErr, opt);
} else {
    alert("ブラウザが位置情報取得に対応していません");
}