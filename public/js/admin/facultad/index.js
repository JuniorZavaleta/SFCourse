var vm = new Vue(
{
    el: '#app',

    data: {
        facultad_selected: 0,
        institucion_selected: 0,
        app_url: '',
        url_edit: '',
        url_delete: '',
        base_url : '',
        url_eaps : '',
        url_periodos : '',
        url_departamentos : '',
    },

    methods: {
        select_row: function(id)
        {
            var last_tr = document.getElementById('facultad_' + this.facultad_selected)
            var tr_selected = document.getElementById('facultad_' + id)

            if (this.facultad_selected == 0) {
                tr_selected.className += ' row-selected'
            } else {
                if (this.facultad_selected == id) {
                    tr_selected.className = 'row-hover'
                } else {
                    last_tr.className = 'row-hover'
                    tr_selected.className += ' row-selected'
                }
            }

            this.facultad_selected = (this.facultad_selected == id) ? 0 : id
        },
        delete_facultad: function()
        {
            event.preventDefault()
            document.getElementById('delete-facultad-form').submit()
        }
    },

    watch: {
        facultad_selected: function(newValue)
        {
            this.base_url = this.app_url + '/admin/facultades/' + newValue;
            if (newValue > 0) {
                this.url_edit = this.base_url + '/editar'
                this.url_delete = this.base_url + '/eliminar'
                this.url_eaps = this.app_url + '/admin/eaps?facultad_id=' + newValue
                this.url_periodos = this.base_url + '/periodos'
                this.url_departamentos = this.base_url + '/departamentos'
            }
        }
    },

    ready: function()
    {
        this.app_url = window.app_url
    }
});
