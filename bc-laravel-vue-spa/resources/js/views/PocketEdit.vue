<script>
    import usePockets from '../composables/pockets'
    import { onMounted, ref } from 'vue'
    import PocketList from '../components/PocketList.vue'

    export default {
        components: { PocketList },
        setup() {
            const { pockets, errors, getPockets, updatePockets } = usePockets()

            const pocketList = ref([])
            const isEdit = true
            const isLoading = ref(true)

            onMounted(async () => {
                await getPockets()
                let { 0:accomodation, 1:catering, 2:freetime } = pockets.value
                pocketList.value.push(accomodation)
                pocketList.value.push(catering)
                pocketList.value.push(freetime)
                isLoading.value = false
            })

            const savePockets = async () => {
                pockets.value = pocketList.value
                await updatePockets()
            }

            return {
                pocketList,
                isEdit,
                isLoading,
                errors,
                savePockets,
            }
        }
    }
</script>

<template>
    <div>
        <div class="mt-12 mb-6 text-sm text-center text-red-600 bg-red-200 rounded-md py-6" v-if="errors !== ''">
            {{ errors }}
        </div>
        <pocket-list v-if="!isLoading" :pocket-list="pocketList" :is-edit="isEdit" />
        <div class="items-center text-center mx-auto mt-12">
            <button type="button"
                    class="inline-flex items-center px-6 py-4 text-xs font-semibold tracking-widest text-white uppercase bg-bc-blue rounded-md border border-transparent transition duration-150 ease-in-out hover:bg-bc-blue hover:opacity-75 active:bc-blue focus:outline-none focus:border-bcblue focus:ring disabled:opacity-25"
                    @click="savePockets">
                Mentés
            </button>
        </div>
    </div>
</template>