<template>
    <nav class="context-menu">
        <ul class="items">
            <li class="item">
                <a href="#" class="link">
                    <zondicon icon="view-show"></zondicon> View Item
                </a>
            </li>
            <li class="item">
                <a href="#" class="link">
                    <zondicon icon="edit-pencil"></zondicon> Edit Item
                </a>
            </li>
            <li class="item">
                <a href="#" class="link">
                    <zondicon icon="trash"></zondicon> Delete Item
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: 'ContextMenu'
}
</script>

<style scoped>
    .context-menu {
        display: none;
        position: absolute;
        z-index: 10;
    }

    .context-menu .active {
        display: block;
    }
</style>
