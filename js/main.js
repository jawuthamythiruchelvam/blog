document.querySelector(".open").addEventListener('click',()=>{
    document.querySelector('.nav-link').style.display='flex';
    document.querySelector('.open').style.display='none'
    document.querySelector('.close').style.display='inline-block'
})
document.querySelector(".close").addEventListener('click',()=>{
    document.querySelector('.nav-link').style.display='none';
    document.querySelector('.open').style.display='inline-block'
    document.querySelector('.close').style.display='none'
})
document.querySelector('.inline input[type="checkbox"]').addEventListener('click',() =>{
    document.querySelector('.inline input[type="checkbox"]').classList.toggle('red')
})