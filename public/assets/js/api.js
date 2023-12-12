const Api = {
    Auth: {},
    Color: {},  
    Brand: {},  
    Product: {},  
    Order: {},
    Blog: {},
    Comment: {},



    Category: {},  
    Size: {},  

    Image: {},
    
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();



//Auth
(() => {
    Api.Auth.Register = (data) => $.ajax({
        url: `/auth/register`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Login = (data) => $.ajax({
        url: `/auth/login`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Forgot = (data) => $.ajax({
        url: `/auth/forgot`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Reset = (data) => $.ajax({
        url: `/auth/reset`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Code = () => $.ajax({
        url: `/auth/code`,
        method: 'POST',
        contentType: false,
        processData: false,
    });
    Api.Auth.Change = (data) => $.ajax({
        url: `/auth/change`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Update = (data) => $.ajax({
        url: `/auth/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.GetProfile = (id) => $.ajax({
        url: `/auth/get-profile`,
        method: 'GET',
    });
})();

//Comment
(() => {
    Api.Comment.GetAll = (id) => $.ajax({
        url: `/api/customer/comment/get/${id}`,
        method: 'GET',
    });
    Api.Comment.Create = (data) => $.ajax({
        url: `/api/customer/comment/create`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    }); 
})();


//Color
(() => {
    Api.Color.GetAll = () => $.ajax({
        url: `/api/customer/color/get`,
        method: 'GET',
    }); 
})(); 
 
//Brand
(() => {
    Api.Brand.GetAll = () => $.ajax({
        url: `/api/customer/brand/get`,
        method: 'GET',
    }); 
})(); 
 
//Brand
(() => {
    Api.Blog.GetAll = () => $.ajax({
        url: `/api/customer/blog/get`,
        method: 'GET',
    }); 
})(); 

//Product
(() => {
    Api.Product.GetAll = (filter) => $.ajax({
        url: `/api/customer/product/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            keyword: filter.keyword ?? '',
            tag: filter.tag ?? '',
            page: filter.page ?? '', 
            prices: filter.prices ?? '',
            sort: filter.sort ?? '', 
        }
    }); 
    Api.Product.GetAllNew = () => $.ajax({
        url: `/api/customer/product/get-all-new`,
        method: 'GET',
    }); 
    Api.Product.getOne = (id) => $.ajax({
        url: `/api/customer/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.getBestSale = () => $.ajax({
        url: `/api/customer/product/get-best-sale`,
        method: 'GET',
    });
    Api.Product.GetSearch = (data) => $.ajax({
        url: `/api/customer/product/get-search`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.GetRelated = (id) => $.ajax({
        url: `/api/customer/product/get-related/${id}`,
        method: 'GET',
    });
})(); 


//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/api/customer/category/get`,
        method: 'GET',
    }); 
})(); 


// Order
(() => {
    Api.Order.Checkout = (data) => $.ajax({
        url: `/order/checkout`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Order.GetOrder = () => $.ajax({
        url: `/order/get`,
        method: 'GET',
    });
})();


// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/apip/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();
