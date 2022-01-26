<script>
    import usePockets from '../composables/pockets'
    import { onMounted, ref } from 'vue'
    import PocketList from '../components/PocketList.vue'

    export default {
        components: { PocketList },
        setup() {
            const { pockets, getPockets } = usePockets()

            const pocketList = ref([])
            const isEdit = false
            const isLoading = ref(true)

            onMounted(async () => {
                await getPockets()
                let { 0:accomodation, 1:catering, 2:freetime } = pockets.value
                pocketList.value.push(accomodation)
                pocketList.value.push(catering)
                pocketList.value.push(freetime)
                isLoading.value = false
            })

            return {
                pocketList,
                isEdit,
                isLoading,
            }
        }
    }
</script>

<template>
    <pocket-list v-if="!isLoading" :pocket-list="pocketList" :is-edit="isEdit" />
</template>