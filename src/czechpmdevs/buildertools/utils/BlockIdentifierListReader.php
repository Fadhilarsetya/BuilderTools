<?php

/**
 * Copyright (C) 2018-2022  CzechPMDevs
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

declare(strict_types=1);

namespace czechpmdevs\buildertools\utils;

use czechpmdevs\buildertools\blockstorage\identifiers\BlockIdentifierList;
use pocketmine\block\Block;
use pocketmine\block\tile\Tile;
use pocketmine\world\World;

class BlockIdentifierListReader {
	public function __construct(
		protected BlockIdentifierList $blockIdentifierList,
		protected World $world
	) {}

	public function readNext(int $x, int $y, int $z, ?int &$fullBlockId = null, ?Tile &$tile = null): void {
		$this->blockIdentifierList->nextBlock($fullBlockId);
		$tile = BlockToTileMap::getInstance()->createTile($this->world, $x, $y, $z, $fullBlockId >> Block::INTERNAL_METADATA_BITS);
	}
}