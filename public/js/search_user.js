function onResponse(response) {
    if (!response.ok) {
        console.log('Reponse Fallita');
        return null};
    return response.json();
}

function onJsonUserSearched(json){
    document.getElementById('posts_container').innerHTML='';
    if(json.response === false){
        document.getElementById('user-not-found').classList.remove('hidden');
        document.getElementById('profile-info').classList.add('hidden');
        
    }else{
        document.getElementById('user-not-found').classList.add('hidden');
        document.getElementById('profile-info').classList.remove('hidden');
        
        onJsonUserInfo(json);

        const userId = json.id;
        fetch(BASE_URL + '/userSearchedFeed/'  + userId).then(onResponse).then(onJsonPosts); 
    }
}

function searchUser(event){
    event.preventDefault();
    
    userToFind = encodeURIComponent(document.getElementById('user-to-find').value);
    

    fetch(BASE_URL + '/loadUserInfo/' + userToFind).then(onResponse).then(onJsonUserSearched);
}

const search = document.getElementById('search');
search.addEventListener('click', searchUser);