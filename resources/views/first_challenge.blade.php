<!DOCTYPE html>
<html>

<head>
    <title>Monster Slayer</title>

    <link rel="stylesheet" href="{{url('css/foundation.min.css')}}">
    <link rel="stylesheet" href="{{url('css/first_course_challenge.css')}}">
    <script src="https://npmcdn.com/vue/dist/vue.js"></script>
</head>


<body>
<div id="app">
    <section class="row">
        <div class="small-6 columns">
            <h1 class="text-center">YOU</h1>
            <div class="healthbar">
                <div class="healthbar text-center"
                     style="background-color: green; margin: 0; color: white;"
                     :style="{width : playerHealth + '%'}" >
                    @{{playerHealth}}

                </div>
            </div>
        </div>
        <div class="small-6 columns">
            <h1 class="text-center">MONSTER</h1>
            <div class="healthbar">
                <div class="healthbar text-center"
                     style="background-color: green; margin: 0; color: white;"
                     :style="{width : monsterHealth + '%'}"   >
                        @{{ monsterHealth }}
                </div>
            </div>
        </div>
    </section>
    <section class="row controls" v-if="!gameIsRunning">
        <div class="small-12 columns">
            <button id="start-game" v-on:click ="startGame">START NEW GAME</button>
        </div>
    </section>
    <section class="row controls" v-else>
        <div class="small-12 columns">
            <button id="attack" @click="attack">ATTACK</button>
            <button id="special-attack" @click="specialAttack">SPECIAL ATTACK</button>
            <button id="heal" @click="heal">HEAL</button>
            <button id="give-up" @click="giveUp">GIVE UP</button>
        </div>
    </section>
    <section class="row log" v-if="turns.length > 0">
        <div class="small-12 columns">
            <ul>
                <li v-for="turn in turns"
                    :class = "{'player-turn' : turn.isPlayer, 'monster-turn' : !turn.isPlayer}" >
                    @{{turn.text}}

                </li>
            </ul>
        </div>
    </section>
</div>

<script src="{{url('js/first_course_challenge.js')}}"> </script>
</body>
</html>