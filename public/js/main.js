
const ratings = {
    featured1: 4.0,
    featured2: 5.0,
    featured3: 2.7,
    featured4: 3.0,
    featured5: 5.0,
    featured6: 2.0,
    featured7: 1.0,
    featured8: 4.0,
    featured9: 5.0
}

const totalStars = 5.0;

document.addEventListener('DOMContentLoaded',getRatings());

function getRatings(){

for(let rating in ratings){

    const starPercentage = (ratings[rating] / totalStars) * 100;

    const starPercentageRounded = `${Math.round(starPercentage /10 ) * 10}%`;

    document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;
}

}