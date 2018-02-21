Vue.component('my-template', function(resolve, reject){
  axios.get("/1.html").then(response => {
    var body = response.data.substring(response.data.indexOf("<body>")+6,response.data.indexOf("</body>"))
    resolve({
        template: body,

        props: [
            'title',
            'content',
            'contact',
            'logo'
        ]
    })
  })
})

new Vue({
    el: '#main_template_contect',

    data: {
        title: '',
        content: '',
        contact: '',
        logo: '',
        body: null
    },

    created () {
        this.fetch();
    },

    methods: {
        fetch () {
            let vm = this;

            axios.post('index.php', 'is_ajax=yes')
            .then(function (response) {
                vm.body = response.data.content.substring(response.data.content.indexOf("<body>")+6,response.data.content.indexOf("</body>"))
                vm.title = response.data.attr.title
                vm.content = response.data.attr.content
                vm.contact = response.data.attr.contact
                vm.logo = response.data.attr.logo
                return true
            })
            .catch (function (error) {
                console.log(error)
            })
        }
    }
})




