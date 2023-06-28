<script setup lang='ts'>
import { useRoute } from 'vue-router'

import UsersView from './user.vue'
import ErrorsView from './errors.vue'

const router = useRoute();

</script>

<template>
    <UsersView v-if="router.meta.view === 'userView'"/>
    <ErrorsView v-if="router.meta.view === 'errorView'"/>
</template>

<style lang="scss" scoped>

</style>