var vm = new Vue(
{
    el: '#app',

    data: {
        docente_selected: 0,
        default_url: '',
        url_edit: '',
        base_url: '',
        url_delete: '',
    },

    methods: {
        select_row: function(id)
        {
            var last_tr = document.getElementById('docente' + this.docente_selected)
            var tr_selected = document.getElementById('docente_' + id)

            if (this.docente_selected == 0) {
                tr_selected.className += ' row-selected'
            } else {
                if (this.docente_selected == id) {
                    tr_selected.className = 'row-hover'
                } else {
                    last_tr.className = 'row-hover'
                    tr_selected.className += 'row-selected'
                }
            }

            this.docente_selected = (this.docente_selected == id) ? 0 : id
        },
        delete_docente: function()
        {
            event.preventDefault()
            document.getElementById('delete-docente-form').submit()
        }
    },

    watch: {
        docente_selected: function(newValue)
        {
            this.base_url = this.app_url + '/admin/departamentos/' + this.departamento_selected +'/docentes/' + newValue;
            if (newValue > 0) {
                this.url_edit = this.base_url + '/editar'
                this.url_delete = this.base_url + '/eliminar'
            }
        }
    },

    ready: function()
    {
        this.app_url = window.app_url
        this.departamento_selected = document.getElementById('departamento_id').value;
    }
});
