<template>
    <div class="flex gap-2">
        <div>
            <button @click="b(1)" class="p-1 border">1</button>
        </div>
        <div>
            <button @click="b(2)" class="p-1 border">2</button>
        </div>
    </div>
    <div>
        <div v-for="bet in betList.bet" :key="bet">
            {{bet}}
        </div>
    </div>
</template>
<script setup>
// -------------- import ---------------
const route = inject('route');
import {inject, onMounted, reactive, ref} from "vue";
import {useForm} from "@inertiajs/vue3";
const oddEvenForm = useForm({
    'type': null,
})

const betList = ref({
    'bet': []
})

onMounted(() => {
    console.log('mount')
    window.Echo.channel(`laravel_database_holzzak`)
        .listen('.holzzak', async (event) => {
            console.log('ss', event);
        })
        .listen('.bet', async (event) => {
            console.log('bet', event);
            betList.value.bet.push(event);
        })
})

const b = (type) => {
    oddEvenForm.type = type ?? 1;
    oddEvenForm.post(route('api.oddEven'), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (res) => {
            console.log('bet suc')
        },
        onError: (err) => {
            console.log('bet fail', err)
        }
    });
}



</script>
