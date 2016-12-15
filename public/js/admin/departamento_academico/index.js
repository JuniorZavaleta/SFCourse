var vm = new Vue(
{
    el: '#app',

    data: {
        departamento_selected: 0,
        default_url: '',
        url_edit: '',
        base_url: '',
        url_delete: '',
        url_docentes : '',
    },

    methods: {
        select_row: function(id)
        {
            var last_tr = document.getElementById('departamento_' + this.departamento_selected)
            var tr_selected = document.getElementById('departamento_' + id)

            if (this.departamento_selected == 0) {
                tr_selected.className += ' row-selected'
            } else {
                if (this.departamento_selected == id) {
                    tr_selected.className = 'row-hover'
                } else {
                    last_tr.className = 'row-hover'
                    tr_selected.className += ' row-selected'
                }
            }

            this.departamento_selected = (this.departamento_selected == id) ? 0 : id
        },
        delete_departamento: function()
        {
            event.preventDefault()
            document.getElementById('delete-departamento-form').submit()
        }
    },

    watch: {
        departamento_selected: function(newValue)
        {
            this.base_url = this.app_url + '/admin/facultades/' + this.facultad_selected +'/departamentos/' + newValue;
            if (newValue > 0) {
                this.url_edit = this.base_url + '/editar'
                this.url_delete = this.base_url + '/eliminar'
                this.url_docentes = this.app_url + '/admin/docentes?departamento_id=' + newValue
            }
        }
    },

    ready: function()
    {
        this.app_url = window.app_url
        this.facultad_selected = document.getElementById('facultad_id').value;
    }
});
