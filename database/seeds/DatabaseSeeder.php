<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert(['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('123mudar'), 'type' => '2']);
        DB::table('characteristics')->insert([
        	['id' => 4, 'icon' => '1498610835.png', 'name' => 'Paixão Doentia', 'description' => 'O desejo de viver ao lado da pessoa amada é tão intenso que o personagem está disposto a tudo.', 'type' => 1], 
        	['id' => 5, 'icon' => '1498610898.png', 'name' => 'Vingança', 'description' => 'Devido a um desentendimento passado, o personagem busca retaliação contra aqueles que o fizeram sofrer.', 'type' => 1], 
        	['id' => 6, 'icon' => '1498610963.png', 'name' => 'Devoção à causa', 'description' => 'O personagem simpatiza tanto com uma determinada causa que daria a vida para vê-la frutífera.', 'type' => 1],
        	['id' => 7, 'icon' => '1498611051.png', 'name' => 'Competitivo', 'description' => 'O personagem enxerga tudo como disputas de poder, mesmo coisas banais. Quando ele entra em alguma disputa, ele sempre leva tudo muito a sério.', 'type' => 0],
        	['id' => 8, 'icon' => '1498611168.png', 'name' => 'Aversão ao Fracasso', 'description' => 'O personagem não consegue lidar bem com uma situação em que ele julgue que de alguma maneira falhou. As casualidades decorrentes de um fracasso podem variar.', 'type' => 0],
        	['id' => 9, 'icon' => '1498611285.png', 'name' => 'Ilusões de Grandeza', 'description' => 'O personagem aspira ser alguém importante. Não está satisfeito com sua posição na sociedade e almeja ascensão social.', 'type' => 1],
        	['id' => 10, 'icon' => '1498611351.png', 'name' => 'Unidade Familiar', 'description' => 'O personagem fará de tudo para manter os seus familiares seguros, felizes e bem sucedidos.', 'type' =>1],
        	['id' => 11, 'icon' => '1498611473.png', 'name' => 'Desvio Sexual', 'description' => 'O personagem não se comporta sexualmente como a maioria das pessoas de sua categoria racial.', 'type' => 0],
        	['id' => 12, 'icon' => '1498611518.png', 'name' => 'Conquistador', 'description' => 'O personagem sonha em alcançar o poder. E quanto mais poder ele tiver, mais poder ele almejará.', 'type' => 0],
        	['id' => 13, 'icon' => '1498611707.png', 'name' => 'Código do Herói', 'description' => 'O personagem é incapaz de cometer atos que julgue injusto e é intolerante a atos injustos em volta dele.', 'type' => 1],
        	['id' => 14, 'icon' => '1498611803.png', 'name' => 'Propensão à corrupção', 'description' => 'Uma boa conversa e um bom motivo são tudo o que separa o personagem do mundo do crime.', 'type' => 0],
        	['id' => 15, 'icon' => '1498611855.png', 'name' => 'Subordinado às Autoridades', 'description' => 'O personagem sempre obedecerá às autoridades, seja por medo de retaliação ou por respeito.', 'type' => 1],
        	['id' => 16, 'icon' => '1498612041.png', 'name' => 'Rebelde', 'description' => 'Seu personagem tem muita propensão a se rebelar e não aceita regras impostas sem motivo.', 'type' => 1],
        	['id' => 17, 'icon' => '1498612094.png', 'name' => 'Propagador de Ideais', 'description' => 'Seu personagem acredita tanto numa ideia que acha que todas as pessoas deveriam pensar como ele.', 'type' => 1],
        	['id' => 18, 'icon' => '1498612177.png', 'name' => 'Os fins justificam os meios', 'description' => 'Para o seu personagem, não há limites morais que o impeçam de utilizar um recurso disponível para conseguir o que ele quer.', 'type' => 0],
        	['id' => 19, 'icon' => '1498612292.png', 'name' => 'Megalomaníaco', 'description' => 'O personagem se importa apenas consigo mesmo, pois ele se vê como o que há de mais perfeito em todo o mundo.', 'type' => 0],
        	['id' => 20, 'icon' => '1498612371.png', 'name' => 'Justiceiro', 'description' => 'Seu personagem tem sede de justiça, e mesmo que a ele nenhum poder seja incumbido, ele fará a justiça com as próprias mãos.', 'type' => 1],
        	['id' => 21, 'icon' => '1498614644.png', 'name' => 'Censurador', 'description' => 'Seu personagem acredita que deve obrigar as pessoas a seguirem um determinado padrão e punir as que não seguem.', 'type' => 0],
        	['id' => 22, 'icon' => '1498612596.png', 'name' => 'Cruel', 'description' => 'Para o seu personagem, crueldade é um meio válido de se conseguir o que se quer.', 'type' => 0],
        	['id' => 23, 'icon' => '1498612631.png', 'name' => 'Sádico', 'description' => 'Seu personagem tem prazer em fazer os outros sofrerem.', 'type' => 0],
        	['id' => 24, 'icon' => '1498612697.png', 'name' => 'Manipulador', 'description' => 'Sempre há um plano por trás de tudo para que todas as peças do tabuleiro se mexam como este personagem quer.', 'type' => 1],
        	['id' => 25, 'icon' => '1498612754.png', 'name' => 'Traidor', 'description' => 'Se houver um motivo razoável, seu personagem trairá aqueles que acham que podem confiar nele.', 'type' => 1],
        	['id' => 26, 'icon' => '1498612833.png', 'name' => 'Empático', 'description' => 'Se colocar no lugar dos outros é algo que seu personagem está fazendo o tempo todo.', 'type' => 1],
        	['id' => 27, 'icon' => '1498612911.png', 'name' => 'Mão-de-Vaca', 'description' => 'Seu personagem sempre fará apenas o mínimo que pode pelos outros.', 'type' => 1],
        	['id' => 28, 'icon' => '1498613045.png', 'name' => 'Alcólatra', 'description' => 'Esse personagem possui um problema com o álcool e ele não consegue parar de beber.', 'type' => 0],
        	['id' => 29, 'icon' => '1498613110.png', 'name' => 'Viciado em substância', 'description' => 'Seu personagem está sujeito à dependência de uma substância, e a falta dela acarretará em consequências momentâneas ao bem estar do personagem.', 'type' => 0],
        	['id' => 30, 'icon' => '1498613333.png', 'name' => 'Dependência do Círculo Social', 'description' => 'Seu personagem utiliza seu círculo de conhecidos para manter sua estabilidade emocional.', 'type' => 0],
        	['id' => 31, 'icon' => '1498613397.png', 'name' => 'Aversão a Mudanças', 'description' => 'Seu personagem quer que tudo fique como está para sempre.', 'type' => 0],
        	['id' => 32, 'icon' => '1498613434.png', 'name' => 'Transtorno Alimentar', 'description' => 'Comida é um recurso recorrente que seu personagem usa para se manter feliz.', 'type' => 0],
        	['id' => 33, 'icon' => '1498613486.png', 'name' => 'Complexo de Inferioridade', 'description' => 'Seu personagem sempre vai achar que está abaixo dos outros ao seu redor.', 'type' => 0],
        	['id' => 34, 'icon' => '1498613600.png', 'name' => 'Dificuldade para se auto-afirmar', 'description' => 'Deixado à deriva, seu personagem começará a questionar seu papel em suas relações, ou na sociedade, tendendo a se enxergar como inútil.', 'type' => 1],
        	['id' => 35, 'icon' => '1498613705.png', 'name' => 'Aversão à Rejeição', 'description' => 'Pelo simples medo de ser rejeitado, seu personagem se entrega ou se arrisca muito pouco. Talvez a rejeição já o fez sofrer muito no passado.', 'type' => 0],
        	['id' => 36, 'icon' => '1498613940.png', 'name' => 'Libidinoso', 'description' => 'Sexualidade representa uma grande fatia da vida do seu personagem. Possivelmente ele enxerga órgãos genitais em vez de pessoas na rua.', 'type' => 0],
        	['id' => 37, 'icon' => '1498614005.png', 'name' => 'Amputado', 'description' => 'Seu personagem tem um dos membros de seu corpo faltando.', 'type' => 0],
        	['id' => 38, 'icon' => '1498614032.png', 'name' => 'Cego', 'description' => 'Seu personagem não pode enxergar.', 'type' => 0],
        	['id' => 39, 'icon' => '1498614083.png', 'name' => 'Violento', 'description' => 'A violência é sempre a resposta para o seu personagem.', 'type' => 1],
        	['id' => 40, 'icon' => '1498614125.png', 'name' => 'Doente Crônico', 'description' => 'Alguma doença aflige o personagem com uma frequência absurda.', 'type' => 0],
        	['id' => 41, 'icon' => '1498614242.png', 'name' => 'Autista', 'description' => 'Existem várias coisas no mundo que, por mais que seu personagem tente, nunca irá entendê-las da maneira como elas realmente são.', 'type' => 0],
        	['id' => 42, 'icon' => '1498614303.png', 'name' => 'Traumatizado', 'description' => 'Algo do passado do personagem o assombra frequentemente. Os efeitos do trauma podem variar.', 'type' => 0],
        	['id' => 43, 'icon' => '1498614377.png', 'name' => 'Depressivo', 'description' => 'Seu personagem não tem vontade de fazer nada que ele não é obrigado. As coisas que antes ele achava divertidas agora não mais o são.', 'type' => 0],
        	['id' => 44, 'icon' => '1498614470.png', 'name' => 'Paranóia', 'description' => 'Seu personagem acredita veementemente em algo que ninguém mais acredita e que parece impossível em teoria. Será que sua vida está em perigo?', 'type' => 0],
        	['id' => 45, 'icon' => '1498614545.png', 'name' => 'Amaldiçoado', 'description' => 'Devido a um evento passado, seu personagem está amaldiçoado. Alguma força sobrenatural o prejudica de maneira constante.', 'type' => 0],
        	['id' => 46, 'icon' => '1498614603.png', 'name' => 'Fora dos Padrões', 'description' => 'Seu personagem está alheio aos padrões da própria cultura. Ele pode sofrer consequências diversas por conta disso.', 'type' => 1],
        	['id' => 47, 'icon' => '1498614772.png', 'name' => 'Perseguido', 'description' => 'O lugar onde seu personagem viveu durante a maior parte de sua vida agora quer sua cabeça em uma travessa de prata.', 'type' => 1],
        	['id' => 48, 'icon' => '1498614822.png', 'name' => 'Má Fama', 'description' => 'Algo sobre seu personagem é muito popular na cidade e isso não é uma coisa boa para ele.', 'type' => 1],
        	['id' => 49, 'icon' => '1498614957.png', 'name' => 'Reverenciado', 'description' => 'Seu personagem tem subordinados que o respeitam incondicionalmente e talvez até morram por ele.', 'type' => 1],
        	['id' => 50, 'icon' => '1498615106.png', 'name' => 'Mal-educado', 'description' => 'Seu personagem tem costumes e um jeito de se portar que não agradam sua cultura.', 'type' => 1],
        	['id' => 51, 'icon' => '1498615176.png', 'name' => 'Aparência Inofensiva', 'description' => 'Parece que seu personagem não machucaria uma flor sequer!', 'type' => 1],
        	['id' => 52, 'icon' => '1498615207.png', 'name' => 'Aparência Aterradora', 'description' => 'A presença do seu personagem oprime e incomoda os que estão à sua volta.', 'type' => 1],
        	['id' => 53, 'icon' => '1498615262.png', 'name' => 'Beleza Incomparável', 'description' => 'Seu personagem é tão bonito que isso pode até se tornar um problema para ele.', 'type' => 1],
        	['id' => 54, 'icon' => '1498615369.png', 'name' => 'Boa Fama', 'description' => 'Algo sobre seu personagem é bem popular e as pessoas o tratam bem por isso.', 'type' => 1],
        	['id' => 55, 'icon' => '1498615416.png', 'name' => 'Aversão ao Estrangeiro', 'description' => 'Tudo o que veio de fora deve ser retirado do recinto ou da cidade, ou mesmo exterminado o mais rápido possível.', 'type' => 1],
        	['id' => 56, 'icon' => '1498615449.png', 'name' => 'Agricultor', 'description' => 'Seu personagem trabalha produzindo comida.', 'type' => 0],
        	['id' => 57, 'icon' => '1498615468.png', 'name' => 'Guerreiro', 'description' => 'Seu personagem vive da arte da espada.', 'type' => 0],
        	['id' => 58, 'icon' => '1498615586.png', 'name' => 'Artesão', 'description' => 'Seu personagem vive de construir e consertar coisas.', 'type' => 0],
        	['id' => 59, 'icon' => '1498615607.png', 'name' => 'Mago', 'description' => 'Seu personagem está envolvido com magia.', 'type' => 0],
        	['id' => 60, 'icon' => '1498615715.png', 'name' => 'Higiênico', 'description' => 'Higiene é essencial para todos, mas para o personagem ela é uma obsessão.', 'type' => 0],
        	['id' => 61, 'icon' => '1498615796.png', 'name' => 'Hedonista', 'description' => 'Seu personagem vive entre uma sessão de prazer e outra.', 'type' => 0],
        	['id' => 62, 'icon' => '1498615826.png', 'name' => 'Preguiçoso', 'description' => 'Se mexer quando não está se fazendo nada pode ser difícil para o personagem.', 'type' => 0],
        	['id' => 63, 'icon' => '1498615888.png', 'name' => 'Organizado', 'description' => 'Tudo para o seu personagem tem data e hora marcada. Seus pertences estão sempre organizados e o que lhe é essencial está sempre ao seu alcance.', 'type' => 0],
        	['id' => 64, 'icon' => '1498616010.png', 'name' => 'Frieza', 'description' => 'Seu personagem dificilmente se emociona por coisas subjetivas ou até mesmo por coisas objetivas.', 'type' => 0],
        	['id' => 65, 'icon' => '1498616081.png', 'name' => 'Solitário', 'description' => 'Seu personagem prefere trabalhar sozinho do que em grupo.', 'type' => 0],
        	['id' => 66, 'icon' => '1498616104.png', 'name' => 'Criminoso', 'description' => 'Seu personagem é efetivamente um fora da lei.', 'type' => 1],
        	['id' => 67, 'icon' => '1498616141.png', 'name' => 'Apego à fé', 'description' => 'A fé é algo muito importante para o seu personagem. Esta fé provavelmente é o que sustenta muitas de suas crenças e ações.', 'type' => 0],
        	['id' => 68, 'icon' => '1498616211.png', 'name' => 'Máscara Emocional', 'description' => 'O jeito que seu personagem pensa e se sente difere da forma como ele age. Talvez ele faça isso conscientemente para conseguir o que quer.', 'type' => 1],
        	['id' => 69, 'icon' => '1498616280.png', 'name' => 'Intimidador', 'description' => 'Seu personagem ameaça os indivíduos à sua volta e usa isso para persuadí-los.', 'type' => 1],
        	['id' => 70, 'icon' => '1498616356.png', 'name' => 'Implosivo', 'description' => 'Seu personagem guarda para si mesmo o que sente.', 'type' => 0],
        	['id' => 71, 'icon' => '1498616393.png', 'name' => 'Explosivo', 'description' => 'Seu personagem reage intensamente a todos os estímulos à sua volta sem que sua mente passe por muitos crivos morais e racionais.', 'type' => 0],
        	['id' => 72, 'icon' => '1498616420.png', 'name' => 'Piadista', 'description' => 'Tudo existe pra que esse personagem tire um sarro.', 'type' => 1]
        ]);
    }
}
