function onJsonLike(json){
    console.log(json);
    return null;
}

function handleLikes(event){
    const likeButton = event.currentTarget;
    const id = likeButton.parentNode.parentNode.parentNode.id;
    num_id = id.substring(id.indexOf('_') + 1, id.length);
    const numLikes = likeButton.parentNode.getElementsByClassName('num-likes')[0];
    
    if(likeButton.classList.contains('like')){
        likeButton.src = 'images/not_liked.png';

        fetch(BASE_URL + '/removeLike/' + num_id).then(onResponse).then(onJsonLike);

        likeButton.classList.add('not_like');
        likeButton.classList.remove('like');
        numLikes.textContent = (parseInt(numLikes.textContent) -1).toString();

    }else{

        likeButton.src = 'images/liked.png';

        fetch(BASE_URL + '/addLike/' + num_id).then(onResponse).then(onJsonLike);

        likeButton.classList.add('like');
        likeButton.classList.remove('not_like');
        numLikes.textContent = (parseInt(numLikes.textContent) + 1).toString();
    }
 
}
