//Vue
Vue.component('nav-ul-items', {
    props: ['item'],
    data: function (){
        return {
            flag: false,
        }
    },
    computed: {
        navHoverClass: function (){
            return {
                'nav-hover-class': this.flag,
            }
        }
    },
    methods: {
        direct: function (){
            window.location.href = this.item.url;
            console.log(this.item.name);
        },
        enter: function (e){
            this.flag = true;
        },
        leave: function (e){
            this.flag = false;
        }
    },
    template:`
            <li @click="direct" @mouseenter="enter" @mouseleave="leave" v-bind:class="navHoverClass">{{item.name}}</li>
        `,
});
Vue.component('unit-block', {
    props: ['info'],
    template: `
            <div class="line-block">
                <div class="icon-line" v-html="info.svg"></div>
                <span class="line-span">{{info.spanName}}</span>
                <div class="line"></div>
            </div>
        `,
});
const itemsList = [
    {name: 'Home', url: '/'},
    {name: 'About', url: '/about'},
    {name: 'Links', url: 'links'},
    {name: 'Img', url: '/imgs'},
    {name: 'Search', url: '/search'},
];
let nav = new Vue({
    el: '#nav',
    data: {
        items: itemsList,
    },
    methods: {
        dirHome: function (){
            window.location.href = '/'; // 跳转到自己
        }
    }
})
let bodyMain = new Vue({
    el: '#body-main',
    data: {
        items: [
            {
                svg:
                    `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-heart" viewBox="0 0 16 16">
                            <path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>`,
                spanName: 'Like',
            },
            {
                svg:
                    `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" className="bi bi-cup" viewBox="0 0 16 16">
                            <path d="M1 2a1 1 0 0 1 1-1h11a1 1 0 0 1 1 1v1h.5A1.5 1.5 0 0 1 16 4.5v7a1.5 1.5 0 0 1-1.5 1.5h-.55a2.5 2.5 0 0 1-2.45 2h-8A2.5 2.5 0 0 1 1 12.5V2zm13 10h.5a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5H14v8zM13 2H2v10.5A1.5 1.5 0 0 0 3.5 14h8a1.5 1.5 0 0 0 1.5-1.5V2z"/>
                        </svg>`,
                spanName: 'Discovery',
            },
        ],
    },

})
