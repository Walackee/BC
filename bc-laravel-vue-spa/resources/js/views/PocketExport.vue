<script>
    import usePockets from '../composables/pockets'
    import { onMounted, ref } from 'vue'
    import PocketList from '../components/PocketList.vue'

    export default {
        components: { PocketList },
        setup() {
            const { pockets, getPockets, exportPockets } = usePockets()

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
                exportPockets,
            }
        }
    }
</script>

<template>
    <div>
        <pocket-list v-if="!isLoading" :pocket-list="pocketList" :is-edit="isEdit" />
        <div class="items-center text-center mx-auto mt-12">
                <button type="button"
                        class="inline-flex items-center px-6 py-4 text-xs font-semibold tracking-widest text-white uppercase bg-bc-blue rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-bc-blue hover:opacity-75 active:bc-blue focus:outline-none focus:border-bcblue focus:ring disabled:opacity-25"
                        @click="exportPockets">
                    Export
                </button>
            </div>
    </div>
</template>