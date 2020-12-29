<?php namespace mdl;

/*
 * 试题：VR影视动漫设计师
 * 20181001
 */
class jieguo
{

	//性格 20181016
	public static function xg($nmb)
	{
		//$r='';
		switch($nmb)
		{
			case $nmb>20:
				$r=[
					'活泼型',
					'<li>你是一个情感丰富而外露的人，由于性格活跃，爱说，爱讲故事，幽默，彩色记忆，能抓住听众，你常常是聚会的中心人物。你是一个天才的演员，天真无邪，热情诚挚，喜欢送礼和接受礼物，看重人缘。情绪化的特点使得你容易兴奋，喜欢吹吹牛、说说大话，天真单纯，富有喜剧色彩。但是，你似乎总也很容易生气，爱抱怨，大嗓门，不成熟。</li><li>在工作方面，你是一个热情的推动着，总是有新的注意，色彩丰富，说干就敢，能够鼓励和带领他人，一起积极投入工作。可是你似乎总是情绪决定一切，想哪儿说哪儿，而且说得多干得少，遇到困难容易失去信心，杂乱无章，做事不彻底，爱走神儿，爱找借口。</li><li>在人际关系方面，你容易交上朋友，朋友也多。你关爱朋友，也被朋友称赞。你爱当主角，爱受欢迎喜欢控制谈话内容。</li>'
				];
				break;		
			case $nmb>10:
				$r=[
					'完美型',
					'<li>在情感方面，你是一个性格深沉的人，严肃认真，目的性强，善于分析，愿意思考人生与工作的意义，喜欢美丽，对他人敏感，理想主义。但是，你总是习惯于记住负面的东西，容易 情绪低落，过分自我反省，自我贬低，离群索居，有忧郁倾向。</li><li>在工作方面，你是一个完美主义者，高标准，计划性强，注重细节，讲究条理，整洁，能够发现问题并制订解决问题的办法，喜欢图表和清单，坚持己见，善始善终。但是你也很有可能是一个优柔寡断的人，习惯于收集信息资料做分析，却很难投入到实际运作的工作中来。你容易自我否定，因此需要别人的认同。同时，你也习惯于挑剔别人，不能忍受别人的工作做不好。</li><li>对待人际关系，你一方面在寻找理想伙伴，另一方面却交友谨慎。你能够深切地关怀他人，善于倾听抱怨，帮助别人解决困难。但是，你似乎始终有一种不安全感，以至于你感情内向，退缩，怀疑别人，喜欢批评人和事，却不喜欢别人的反对。</li>',
				];
				break;		
			default:
				$r=[
					'力量型',
					'<li>在情感方面，你是一个坚定果敢的人，酷好变化，喜欢控制，干劲十足，独立自主，超级自信。可是，由于你比较不会顾及别人的感受，所以显得粗鲁、霸道、没有耐心、穿追不舍、不会放松。你不习惯与别人进行感情上的交流，不会恭维人，不喜欢眼泪，缺乏同情心。</li><li>在工作方面，你是一个务实和讲究效率的人，目标明确，眼光全面，组织力强，行动迅速，解决问题不过夜，果敢坚持到底，在反对声中成长。但是，因为过于强调结果，你往往容易忽视细节，处理问题不够细致。爱管人、喜欢支使他人的特点使得你能够带动团队进步，但也容易激起团队成员的反感。</li><li>在人际关系方面，你喜欢为别人做主，虽然这样能够帮助别人做出选择，但也容易让人有强迫感。由于关注自己的目标，你在乎的是别人的可利用价值。喜欢控制别人，不会说对不起。</li>',
				];
		}

		return $r;
	}

	//性格
	public static function xg_old($nmb)
	{
		$r='';
		switch($nmb)
		{
			case $nmb>31:
				$r=[
					'和平型(P型)',
					'<li>让我们与和平型一起轻松！</li>
					<li>上天特别创造了和平型的人，他是情感的缓冲器，提供了稳定和平衡。和平型缓和色彩斑斓的活泼型；拒绝过分欣赏力量型的优秀决定；对完美型的复杂计划也不过分认真。和平型的人是我们中间伟大的促进平等者。</li>
					<li>他告诉我们：“这没有什么了不起。”确实从长远来说，确实是这样。</li>'
				];
				break;		
			case $nmb>23:
				$r=[
					'力量型(C型)',
					'<li>让我们与力量型一起行动！</li>
					<li>力量型的人，永远充满动力，他们会充满理想，他勇于攀登高不可攀的顶峰，总是对准目标前进。当活泼型的人在说话，完美型的人在思考，力量型的人会进取。他有不二定律：“现在就按我的方式去做！”。你会发现，他的脾气最容易懂，并且是最好相处的。</li>
					<li>力量型的人能够和人坦诚的与人交流，他知道一切将会妥当——只要他来负责。由于力量型的是目标主导蒹具有与升俱来的领导素质，他们往往在自己的选择中达致顶峰。大多数具政治影响力的领导，都是力量型的。我们需要灵活、控制、司令、自信、强烈意志、主宰、决策程序、权力、更快、完备！</li>',
				];
				break;		
			case $nmb>14:
				$r=[
					'完美型(M型)',
					'<li>让我们和完美型一起统筹！</li>
					<li>即使在婴儿阶段，完美型的人似乎懂得深思熟虑。他们文静，随和，喜欢独处。完美型的成年人是个思想家，他们对待目标严肃认真，强调做事情先后和组织，崇尚美感和才智，回为生活作长远且最好的安排。</li>
					<li>如果这世界少了完美型的人，我们会少了诗歌、文学、哲学、和音乐，埋藏我们性格深处的教养、品位、才干便会失去；世界可能少了很多工程师、发明家、科学家，我们的经济和咨讯都会失去平衡。完美型的人是人类的灵魂、智慧、精神、核心。喔，世界多么需要完美型！</li> '
				];
				break;		
			default:
				$r=[
					'活泼型(S型)',
					'<li>让我们和活泼型一起快乐！</li>
					<li>活泼型的人在黑夜把自己高高挂在星宿上，把月亮带回家。迷念生活的童话，总希望永远活的快乐。</li>
					<li>典型的活泼型情感外露，热情奔放，他们懂得把工作变成乐趣，而且乐于与人交往。他们能够从任何事情中发掘出兴奋。他们既外向，又乐观。天啦！如果没有活泼型的人，生活该是多么死气沉沉！我们需要欢笑、幽默和心情舒畅、热情和精力还有热情和魅力。</li>',
				];
		}

		return $r;
	}

	
	/** 
	 * 专业测试结果
	 * @defen number 得分（答对的题数）
	 * @zongfen number 总分（总题数）
	 * @return 正确率
	 * 
	 */
	public static function zy($defen, $zongfen)
	{
		
		
	}


}