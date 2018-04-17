new Vue({
    el : '#app',
    data:
        {
            playerHealth : 100,
            monsterHealth : 100,
            gameIsRunning : false,
            turns : []
        },
    methods :
        {
            startGame : function () {
                this.gameIsRunning = true;
                this.playerHealth = 100;
                this.monsterHealth = 100;
                this.turns =[]
            },
            
            attack: function () {
                var mon_damage = this.calculatedDamage(3,10);
                this.monsterHealth -= mon_damage
                this.turns.unshift({
                    isPlayer :true,
                    text : 'Player Hits The Monster ' + mon_damage,
                });
                if(this.checkWin())
                {
                    return;
                }
                this.monsterAttack();

            },
            
            specialAttack: function () {
                var mon_damage = this.calculatedDamage(10,20)
                this.monsterHealth -= mon_damage;
                this.turns.unshift({
                    isPlayer: true,
                    text: " player hits monster hard " + mon_damage,
                });
                if(this.checkWin())
                {
                    return;
                }
                this.monsterAttack();
                
            },
            
            heal: function () {
                if(this.playerHealth <= 90)
                {
                    this.playerHealth += 10;
                }
                else
                {
                    this.playerHealth = 100;
                }
                this.turns.unshift({
                    isPlayer: true,
                    text: " player heals for 10 " ,
                });

                this.monsterAttack();
            },
            
            giveUp: function () {
                this.gameIsRunning = false;
            },
            monsterAttack:function () {
                player_damage = this.calculatedDamage(5,15);
                this.playerHealth -= player_damage;

                this.turns.unshift({
                    isPlayer : false,
                    text : 'Monster Hits The player ' + player_damage,
                });
                this.checkWin();
            },
            calculatedDamage : function (min,max) {
                return Math.max(Math.floor(Math.random()*max)+1,min);
            },

            checkWin: function () {

                if(this.monsterHealth <=0)
                {
                    if(confirm('You Have Won!! New Game??'))
                    {
                        this.startGame();
                    }
                    else
                    {
                        this.gameIsRunning = false;
                    }
                    return true;
                }
                else if(this.playerHealth <=0)
                {
                    if(confirm("you lost!! New Game???"))
                    {
                        this.startGame();
                    }
                    else
                    {
                        this.gameIsRunning = false;
                    }
                    return true;
                }
                else
                {
                    return false;
                }
            }

        }

});