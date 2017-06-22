$(document).ready(function(){
 	function randomIntFromInterval(min,max){
        return Math.floor(Math.random()*(max-min+1)+min);
    }

    $('.btn-randomize').on('click',function(){
        $('[name=fat]').val(randomIntFromInterval(0,10));
        $('[name=height]').val(randomIntFromInterval(0,10));
        $('[name=extroversion]').val(randomIntFromInterval(0,10));
        $('[name=self-esteem]').val(randomIntFromInterval(0,10));
        $('[name=orderness]').val(randomIntFromInterval(0,10));
        $('[name=optimism]').val(randomIntFromInterval(0,10));
        $('[name=risk]').val(randomIntFromInterval(0,10));
        $('[name=humility]').val(randomIntFromInterval(0,10));
        $('[name=selfishness]').val(randomIntFromInterval(0,10));
        $('[name=emotion]').val(randomIntFromInterval(0,10));
        $('[name=strenght]').val(randomIntFromInterval(0,10));

        var sex=['male','female'];
        $('[name=sex][value='+sex[randomIntFromInterval(0,1)]+']').prop('checked',true);
        $('[name=race]').val(randomIntFromInterval(1,5));
    });
})