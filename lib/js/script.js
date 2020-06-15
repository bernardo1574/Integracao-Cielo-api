let cart = [];
let modalQt = 1;
let modalKey = 0;

const c = (el)=>document.querySelector(el);
const cs = (el)=>document.querySelectorAll(el);

let produtosJson = [
    {id:1, name:'Samsung Galaxy S20 Ultra', img:'lib/img/s20.png', price:7199.00, sizes:['64gb', '128gb', '256gb'], description:' Esse é o smartphone que mudará a história da fotografia!'},
    {id:2, name:'IPhone X', img:'lib/img/iphonex.png', price:4179.05, sizes:['64gb', '128gb', '256gb'], description:'Diga Alô para o futuro.'},
    {id:3, name:'Xiaomi Redmi Note 9S', img:'lib/img/note9.png', price:1749.99, sizes:['64gb', '128gb', '256gb'], description:'A lenda continua!'},
    {id:4, name:'Huawei P30 Pro', img:'lib/img/p30.png', price:6518.10, sizes:['64gb', '128gb', '256gb'], description:'Reescreva as regras da fotografia.'},
    {id:5, name:'Samsung Galaxy Note10', img:'lib/img/note10.png', price:3699, sizes:['64gb', '128gb', '256gb'], description:'Poderoso como você!'},
    {id:6, name:'ASUS Zenfone 6', img:'lib/img/zenfone6.png', price:2879.10, sizes:['64gb', '128gb', '256gb'], description:'Desafie o comum!'},
];
// Listagem das produtoss
produtosJson.map((item, index)=>{
    let produtosItem = c('.models .produtos-item').cloneNode(true);

    produtosItem.setAttribute('data-key', index);
    produtosItem.querySelector('.produtos-item--img img').src = item.img;
    produtosItem.querySelector('.produtos-item--price').innerHTML = `R$ ${item.price.toFixed(2)}`;
    produtosItem.querySelector('.produtos-item--name').innerHTML = item.name;

    produtosItem.querySelector('a').addEventListener('click', (e)=>{
        e.preventDefault();
        let key = e.target.closest('.produtos-item').getAttribute('data-key');
        modalQt = 1;
        modalKey = key;

        c('.produtosBig img').src = produtosJson[key].img;
        c('.produtosInfo h1').innerHTML = produtosJson[key].name;
        c('.produtosInfo--desc').innerHTML = produtosJson[key].description;
        c('.produtosInfo--actualPrice').innerHTML = `R$ ${produtosJson[key].price.toFixed(2)}`;
        c('.produtosInfo--size.selected').classList.remove('selected');
        cs('.produtosInfo--size').forEach((size, sizeIndex)=>{
            if(sizeIndex == 2) {
                size.classList.add('selected');
            }
            size.querySelector('span').innerHTML = produtosJson[key].sizes[sizeIndex];
        });

        c('.produtosInfo--qt').innerHTML = modalQt;

        c('.produtosWindowArea').style.opacity = 0;
        c('.produtosWindowArea').style.display = 'flex';
        setTimeout(()=>{
            c('.produtosWindowArea').style.opacity = 1;
        }, 200);
    });

    c('.produtos-area').append( produtosItem );
});

// Eventos do MODAL
function closeModal() {
    c('.produtosWindowArea').style.opacity = 0;
    setTimeout(()=>{
        c('.produtosWindowArea').style.display = 'none';
    }, 500);
}
cs('.produtosInfo--cancelButton, .produtosInfo--cancelMobileButton').forEach((item)=>{
    item.addEventListener('click', closeModal);
});
c('.produtosInfo--qtmenos').addEventListener('click', ()=>{
    if(modalQt > 1) {
        modalQt--;
        c('.produtosInfo--qt').innerHTML = modalQt;
    }
});
c('.produtosInfo--qtmais').addEventListener('click', ()=>{
    modalQt++;
    c('.produtosInfo--qt').innerHTML = modalQt;
});
cs('.produtosInfo--size').forEach((size, sizeIndex)=>{
    size.addEventListener('click', (e)=>{
        c('.produtosInfo--size.selected').classList.remove('selected');
        size.classList.add('selected');
    });
});
c('.produtosInfo--addButton').addEventListener('click', ()=>{
    let size = parseInt(c('.produtosInfo--size.selected').getAttribute('data-key'));
    let identifier = produtosJson[modalKey].id+'@'+size;
    let key = cart.findIndex((item)=>item.identifier == identifier);
    if(key > -1) {
        cart[key].qt += modalQt;
    } else {
        cart.push({
            identifier,
            id:produtosJson[modalKey].id,
            size,
            qt:modalQt
        });
    }
    updateCart();
    closeModal();
});

c('.menu-openner').addEventListener('click', () => {
    if(cart.length > 0) {
        c('aside').style.left = '0';
    }
});
c('.menu-closer').addEventListener('click', ()=>{
    c('aside').style.left = '100vw';
});

function updateCart() {
    c('.menu-openner span').innerHTML = cart.length;

    if(cart.length > 0) {
        c('aside').classList.add('show');
        c('.cart').innerHTML = '';

        let subtotal = 0;
        let desconto = 0;
        let total = 0;

        for(let i in cart) {
            let produtosItem = produtosJson.find((item)=>item.id == cart[i].id);
            subtotal += produtosItem.price * cart[i].qt;

            let cartItem = c('.models .cart--item').cloneNode(true);

            let produtosSizeName;
            switch(cart[i].size) {
                case 0:
                    produtosSizeName = '64gb';
                    break;
                case 1:
                    produtosSizeName = '128gb';
                    break;
                case 2:
                    produtosSizeName = '256gb';
                    break;
            }

            let produtosName = `${produtosItem.name} (${produtosSizeName})`;
            cartItem.querySelector('img').src = produtosItem.img;
            cartItem.querySelector('.cart--item-nome').innerHTML = produtosName;
            cartItem.querySelector('.cart--item--qt').innerHTML = cart[i].qt;
            cartItem.querySelector('.cart--item-qtmenos').addEventListener('click', ()=>{
                if(cart[i].qt > 1) {
                    cart[i].qt--;
                } else {
                    cart.splice(i, 1);
                }
                updateCart();
            });
            cartItem.querySelector('.cart--item-qtmais').addEventListener('click', ()=>{
                cart[i].qt++;
                updateCart();
            });

            c('.cart').append(cartItem);
        }

        desconto = subtotal * 0.1;
        total = subtotal - desconto;

        c('.subtotal span:last-child').innerHTML = `R$ ${subtotal.toFixed(2)}`;
        c('.desconto span:last-child').innerHTML = `R$ ${desconto.toFixed(2)}`;
        c('.total span:last-child').innerHTML = `R$ ${total.toFixed(2)}`;
        c('#valorTotal').value =  total.toFixed(2);

    } else {
        c('aside').classList.remove('show');
        c('aside').style.left = '100vw';
    }
}
