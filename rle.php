<?php

/**
 * rle压缩算法简单实现
 */

class Rle
{
	// 要压缩或者解压缩的文件路径
	public $sourceFile = '';

	// 解压缩活着压缩之后的文件路径
	public $targetFile = '';

	/**
	 * 初始化处理
	 */
	public function __construct()
	{
	}

	/**
	 * 获得压缩之后的字符串
	 * @param  string $str [description]
	 * @return [type]      [description]
	 */
	public function get_encode_str($str = '')
	{
		// 获取字符串长度
		$lenght = strlen($str);

		echo $lenght;
	}

	/**
	 * 得到解压缩字符串
	 * @param  string $str 需要解压缩的字符串
	 * @return string $res 拼接好的字符串
	 */
	public function get_decode_str($str = '')
	{
		// 对字符串进行分解 获取长度和字符
		$strArr = $this->split($str);

		// 返回结果字符串
		$res = '';

		// 处理数组 拼接字符串
		foreach ($strArr as $key => $value) {
			$res .= str_repeat($value[1], $value[0]);
		}

		return $res;
	}

	/**
	 * 拆分方法 每两个字符为一组 第一位为长度 第二位为字符
	 * @param  string $str 要拆分的字符串
	 * @return array      拆分后的数组 下标0 长度 下标1 字符
	 */
	protected function split($str = '')
	{
		$lenght = strlen($str);

		$res = [];

		// 设置下标
		$index = 0;

		// 处理字符串
		for ($i = 0; $i < $lenght; $i++) {
			// 判断截取的长度
			if (0 == ($i % 2)) {
				// 截取达到两位 进行下一组截取
				$index++;

				$res[$index][] = $str{$i};
			} else {
				$res[$index][] = $str{$i};
			}
		}

		return $res;
	}
}

$rle = new Rle();

$rle->get_decode_str('1a2b3c5k');

var_dump($argv);
