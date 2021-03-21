
var urlAPI = {//esta era el script del servicio, 
    Maestros: {
        GetCategoria: 'https://servicessgd.azurewebsites.net/api/Maestros/GetCategoria',
        GetDistrito: 'https://servicessgd.azurewebsites.net/api/Maestros/GetDistrito',
        GetTipoDocumento: 'https://servicessgd.azurewebsites.net/api/Maestros/GetTipoDocumento',
        GetTipoUsuario: 'https://servicessgd.azurewebsites.net/api/Maestros/GetTipoUsuario',
        GetRestaurant: 'https://servicessgd.azurewebsites.net/api/Maestros/GetRestaurant',
        GetEstadoReserva: 'https://servicessgd.azurewebsites.net/api/Maestros/GetEstados'
    },
    Productos: {
        GetProductos: 'https://servicessgd.azurewebsites.net/api/Producto/GetProductos',
        InsertarProducto: 'https://servicessgd.azurewebsites.net/api/Producto/InsertarProducto',
        ActualizarProducto: 'https://servicessgd.azurewebsites.net/api/Producto/ActualizarProducto',
    },
    Usuario: {
        ObtenerLogin: 'https://servicessgd.azurewebsites.net/api/Usuarios/ObtenerLogin',
        ValidarRestaurant: 'https://servicessgd.azurewebsites.net/api/Usuarios/ValidarRestaurant',
        RegistrarUsuarios: 'https://servicessgd.azurewebsites.net/api/Usuarios/RegistrarUsuarios',
        GetUsuariosPorRestaurante: 'https://servicessgd.azurewebsites.net/api/Usuarios/GetUsuariosPorRestautante',
        InsertarUsuarioPorRestaurante: 'https://servicessgd.azurewebsites.net/api/Usuarios/InsertarUsuarioPorRestaurante',
        ActualizarUsuarioPorRestaurante: 'https://servicessgd.azurewebsites.net/api/Usuarios/ActualizarUsuarioPorRestaurante'
    },
    Reserva: {
        InsertarReserva: 'https://servicessgd.azurewebsites.net/api/Reserva/InsertarReserva',
        GetReservas: 'https://servicessgd.azurewebsites.net/api/Reserva/GetReservas',
        GetInfoRestaurante : 'https://servicessgd.azurewebsites.net/api/Reserva/GetInfoRestaurante'
    }
}

function getUrlAPI(tabla, accion) {
    var url = urlAPI[tabla][accion];
    return url;
}
