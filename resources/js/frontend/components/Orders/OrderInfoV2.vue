<template>
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <h1 class="text-center py-5">Thank you for your order!</h1>
            <h6>Order ID: {{ number }}</h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Estimated Delivery time:</strong> <br>-</div>
                    <div class="col"> <strong>Shipping BY:</strong> <br>-</div>
                    <div class="col"> <strong>Status:</strong> <br>{{ order.type }}</div>
                    <div class="col"> <strong>Tracking:</strong> <br>-</div>
                </div>
            </article>
            <hr>

            <article class="card">
                <header class="card-header"> Payment Summary </header>
                <div class="row row-main p-2 mt-2" v-for="(item, index) in order.items" v-bind:key="index">
                    <div class="col-2 text-center">
                        <img class="img-fluid" style="height: 128px;" src="/img/product/default.png">
                    </div>
                    <div class="col-8">
                        <div class="row d-flex">
                            <p class="w-100"><b>{{ item.name.substr(0, 24) }} ...</b></p>
                        </div>
                        <div class="row d-flex">
                            <p class="w-100 text-muted">{{ item.description.substr(0, 128) }} ...</p>
                        </div>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <p class="text-center">
                            <b>{{ item.count }}</b> × <b>$ {{ item.price.toLocaleString('en-US') }}.00</b>
                        </p>
                    </div>
                </div>
                <hr class="mx-3">
                <div class="total p-2">
                    <div class="row">
                        <div class="col"><b>Total:</b></div>
                        <div class="col d-flex justify-content-end"><b>$ {{ order.price.toLocaleString('en-US') }}.00</b></div>
                    </div>
                </div>
            </article>
            <hr>
            <a href="/" class="btn btn-warning" data-abc="true">
                <i class="fa fa-chevron-left"></i> Back to Dashborad
            </a>
        </div>
    </article>
</template>

<script>
    export default {
        name: "OrderInfoV2",
        props:{
            number: {
                type: String,
                require: true,
            },
        },
        data() {
            return {
                order: {
                    type: null,
                    price: null,
                    items: [],
                },
            }
        },
        mounted() {
            axios.get(`/api/testing/v2/order/${this.number}`)
                .then(response => {
                    this.order = response.data.data;
                })
                .catch(error => console.log(error));
        },
    }
</script>
