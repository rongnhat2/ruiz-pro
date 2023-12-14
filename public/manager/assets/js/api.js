const Api = {
    Image: {},
    Color: {},  
    Brand: {},  
    Category: {},  
    Banner: {},  
    Product: {},  
    Discount: {},  


    Order: {},
    Warehouse: {},
    Statistic: {},
    Blog: {},

    
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();



// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/api/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();

//Color
(() => {
    Api.Color.GetAll = () => $.ajax({
        url: `/api/color/get`,
        method: 'GET',
    }); 
    Api.Color.Store = (data) => $.ajax({
        url: `/api/color/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Color.getOne = (id) => $.ajax({
        url: `/api/color/get-one/${id}`,
        method: 'GET',
    });
    Api.Color.Update = (data) => $.ajax({
        url: `/api/color/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Color.Delete = (id) => $.ajax({
        url: `/api/color/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Brand
(() => {
    Api.Brand.GetAll = () => $.ajax({
        url: `/api/brand/get`,
        method: 'GET',
    }); 
    Api.Brand.Store = (data) => $.ajax({
        url: `/api/brand/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Brand.getOne = (id) => $.ajax({
        url: `/api/brand/get-one/${id}`,
        method: 'GET',
    });
    Api.Brand.Update = (data) => $.ajax({
        url: `/api/brand/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Brand.Delete = (id) => $.ajax({
        url: `/api/brand/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/api/category/get`,
        method: 'GET',
    }); 
    Api.Category.Store = (data) => $.ajax({
        url: `/api/category/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.getOne = (id) => $.ajax({
        url: `/api/category/get-one/${id}`,
        method: 'GET',
    });
    Api.Category.Update = (data) => $.ajax({
        url: `/api/category/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.Delete = (id) => $.ajax({
        url: `/api/category/delete/${id}`,
        method: 'GET',
    });
})(); 

//Blog
(() => {
    Api.Blog.GetAll = () => $.ajax({
        url: `/api/blog/get`,
        method: 'GET',
    }); 
    Api.Blog.Store = (data) => $.ajax({
        url: `/api/blog/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Blog.getOne = (id) => $.ajax({
        url: `/api/blog/get-one/${id}`,
        method: 'GET',
    });
    Api.Blog.Update = (data) => $.ajax({
        url: `/api/blog/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Blog.Delete = (id) => $.ajax({
        url: `/api/blog/delete/${id}`,
        method: 'GET',
    });
})(); 

//Product
(() => {
    Api.Product.GetAll = () => $.ajax({
        url: `/api/product/get`,
        method: 'GET',
    }); 
    Api.Product.Store = (data) => $.ajax({
        url: `/api/product/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.getOne = (id) => $.ajax({
        url: `/api/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.Update = (data) => $.ajax({
        url: `/api/product/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.Delete = (id) => $.ajax({
        url: `/api/product/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Banner
(() => {
    Api.Banner.GetAll = () => $.ajax({
        url: `/api/banner/get`,
        method: 'GET',
    }); 
    Api.Banner.Store = (data) => $.ajax({
        url: `/api/banner/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Banner.getOne = (id) => $.ajax({
        url: `/api/banner/get-one/${id}`,
        method: 'GET',
    });
    Api.Banner.Update = (data) => $.ajax({
        url: `/api/banner/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Banner.Delete = (id) => $.ajax({
        url: `/api/banner/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Discount
(() => {
    Api.Discount.GetAll = () => $.ajax({
        url: `/api/discount/get`,
        method: 'GET',
    }); 
    Api.Discount.Store = (data) => $.ajax({
        url: `/api/discount/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Discount.getOne = (id) => $.ajax({
        url: `/api/discount/get-one/${id}`,
        method: 'GET',
    });
    Api.Discount.Update = (data) => $.ajax({
        url: `/api/discount/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Discount.Delete = (id) => $.ajax({
        url: `/api/discount/delete/${id}`,
        method: 'GET',
    });
})(); 

// Warehouse
(() => {
    Api.Warehouse.GetDataItem = () => $.ajax({
        url: `/api/warehouse/get-item`,
        method: 'GET',
    });
    Api.Warehouse.GetDataHistory = () => $.ajax({
        url: `/api/warehouse/get-history`,
        method: 'GET',
    }); 
    Api.Warehouse.Store = (data) => $.ajax({
        url: `/api/warehouse/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Warehouse.getOne = (id) => $.ajax({
        url: `/api/warehouse/get-ware-one/${id}`,
        method: 'GET',
    });
})();

//Order
(() => {
    Api.Order.GetAll = (id) => $.ajax({
        url: `/api/order/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.GetOne = (id) => $.ajax({
        url: `/api/order/get-one`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.Update = (data) => $.ajax({
        url: `/api/order/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();

// Statistic
(() => {
    Api.Statistic.getTotal = () => $.ajax({
        url: `/api/statistic/get-total`,
        method: 'GET',
    });
    Api.Statistic.getBestSale = () => $.ajax({
        url: `/api/statistic/get-best-sale`,
        method: 'GET',
    });
    Api.Statistic.getCustomerBuy = () => $.ajax({
        url: `/api/statistic/get-customer`,
        method: 'GET',
    });
    Api.Statistic.getMonth = () => $.ajax({
        url: `/api/statistic/get-month`,
        method: 'GET',
    });
})();