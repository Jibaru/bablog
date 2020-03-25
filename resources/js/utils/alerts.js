import Swal from 'sweetalert2';

export const DELETED_MESSAGE = 'Eliminado correctamente';
export const UPDATED_MESSAGE = 'Actualizado correctamente';
export const CREATED_MESSAGE = 'Creado correctamente';
export const LOADED_MESSAGE  = 'Cargado correctamente';
export const ERROR_MESSAGE   = 'Ocurrió un error, intenta de nuevo';

export const showCreatedMessage = () => {
    return Swal.fire(
        'Correcto',
        CREATED_MESSAGE,
        'success'
    );
};

export const showUpdatedMessage = () => {
    return Swal.fire(
        'Correcto',
        UPDATED_MESSAGE,
        'success'
    );
};

export const showLoadedMessage = () => {
    return Swal.fire(
        'Correcto',
        LOADED_MESSAGE,
        'success'
    );
};

export const showDeletedMessage = () => {
    Swal.fire(
        'Correcto',
        DELETED_MESSAGE,
        'success'
    );
};

export const showConfirmDeleteMessage = () => {
    return Swal.fire({
        title: 'Eliminar',
        html: '¿Desea eliminar el elemento?',
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar',
        cancelButtonText: 'Cancelar'
    });
};
