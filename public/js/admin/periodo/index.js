var vm = new Vue(
{
    el: '#app',

    data: {
        periodo_selected: 0,
        default_url: '',
        url_edit: '',
        base_url: '',
        url_delete: '',
    },

    methods: {
        select_row: function(id)
        {
            var last_tr = document.getElementById('periodo_' + this.periodo_selected)
            var tr_selected = document.getElementById('periodo_' + id)

            if (this.periodo_selected == 0) {
                tr_selected.className += ' row-selected'
            } else {
                if (this.periodo_selected == id) {
                    tr_selected.className = 'row-hover'
                } else {
                    last_tr.className = 'row-hover'
                    tr_selected.className += ' row-selected'
                }
            }

            this.periodo_selected = (this.periodo_selected == id) ? 0 : id
        },
        delete_periodo: function()
        {
            event.preventDefault()
            document.getElementById('delete-periodo-form').submit()
        }
    },

    watch: {
        periodo_selected: function(newValue)
        {
            this.base_url = this.app_url + '/admin/facultades/' + this.facultad_selected +'/periodos/' + newValue;
            if (newValue > 0) {
                this.url_edit = this.base_url + '/editar'
                this.url_delete = this.base_url + '/eliminar'
            }
        }
    },

    ready: function()
    {
        this.app_url = window.app_url
        this.facultad_selected = document.getElementById('facultad_id').value;
    }
});
