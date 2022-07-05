function onJsonUserInfo(json){
    console.log(json);
    if(json.length > 1){
        json = json[0];
    }

    const userPhoto = document.getElementById('profile-photo');
    userPhoto.src = "data:image/jpg;charset=utf8;base64," +  json.photo;

    const nameSurname = document.getElementById('name-surname');
    nameSurname.textContent = json.name + " " + json.surname;

    const username = document.getElementById('username');
    username.textContent = "@" + json.username;

    const nposts = document.getElementById('nposts');
    const nlikes = document.getElementById('nlikes');
    const ncomments = document.getElementById('ncomments');

    nposts.textContent = json.nposts;
    nlikes.textContent = json.nlikes;
    ncomments.textContent = json.ncomments;
}

fetch(BASE_URL + '/loadUserInfo').then(onResponse).then(onJsonUserInfo);