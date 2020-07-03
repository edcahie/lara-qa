<template>
    <div class="d-fex flex-column vote-controls">
        <a @click.prevent="voteUp" :title="title('up')"
           class="vote-up" :class="classes">
            <i class="fas fa-caret-up fa-3x"></i>
        </a>

        <span class="votes-count">{{ count }}</span>

        <a @click.prevent="voteDown" :title="title('down')"
           class="vote-down" :class="classes">
            <i class="fas fa-caret-down fa-3x"></i>
        </a>

        <favorite  v-if="name === 'question'" :question="model"></favorite>
        <Accept v-else :answer="model"></Accept>
        <!--<favorite-component v-if="name === 'question'" :question="model"></favorite-component>-->
        <!--<accept-component v-else :answer="model"></accept-component>-->
    </div>
</template>

<script>
    import Favorite from './FavoriteComponent.vue';
    import Accept from './AcceptComponent.vue';

    export default {
        props: ['name', 'model'],
        computed: {
            classes () {
                return this.signedIn ? '' : 'off';
            },
            endpoint () {
                return `/${this.name}s/${this.id}/vote`;
            }
        },
        components: {
            Favorite,
            Accept
        },
        data () {
            return {
                //count: this.model.votes_count,
                count: this.model.votes_count || 0,

                id: this.model.id
            }
        },
        methods: {
            title (voteType) {
                let titles = {
                    up: `This ${this.name} is useful`,
                    down: `This ${this.name} is not useful`
                };
                return titles[voteType];
            },
            voteUp () {
                this._vote(1);
            },
            voteDown () {
                this._vote(-1);
            },
            _vote (vote) {
                if (! this.signedIn) {
                    this.$toast.warning(`Please login to vote the ${this.name}`, "Warning", {
                        timout: 3000,
                        position: 'bottomLeft'
                    });
                    return;
                }
                axios.post(this.endpoint, { vote })
                    .then(res => {
                        console.log(res.data);
                        this.$toast.success(res.data.message, "Success", {
                            timeout: 3000,
                            position: 'bottomLeft'
                        });
                        this.count = res.data.votesCount;
                    })
            }
        }
    }
</script>