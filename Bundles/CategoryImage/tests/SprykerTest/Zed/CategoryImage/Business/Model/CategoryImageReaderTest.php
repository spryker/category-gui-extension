<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\CategoryImage\Business\Model;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CategoryImageSetTransfer;
use Generated\Shared\Transfer\CategoryImageTransfer;
use Generated\Shared\Transfer\CategoryTransfer;
use Generated\Shared\Transfer\LocaleTransfer;
use Spryker\Zed\CategoryImage\Persistence\CategoryImageRepositoryInterface;
use Spryker\Zed\CategoryImage\Business\Model\Reader;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Zed
 * @group CategoryImage
 * @group Business
 * @group Model
 * @group CategoryImageReaderTest
 * Add your own group annotations below this line
 */
class CategoryImageReaderTest extends Unit
{
    public const CATEGORY_KEY = 'test-category';
    public const CATEGORY_IMAGE_SET_NAME = 'test-category-image-set';
    public const CATEGORY_IMAGE_URL_SMALL = 'url-small';
    public const CATEGORY_IMAGE_URL_LARGE = 'url-large';

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\CategoryImage\Persistence\CategoryImageRepositoryInterface
     */
    protected $repository;

    /**
     * @var \Spryker\Zed\CategoryImage\Business\Model\Reader
     */
    protected $reader;

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->repository = $this->createRepositoryMock();
        $this->reader = new Reader(
            $this->repository
        );
    }

    /**
     * @return void
     */
    public function testExpandCategoryWithImageSetsEmpty()
    {
        $categoryTransfer = $this->createCategoryTransfer(1);
        $this->repository->method('findCategoryImageSetsByCategoryId')
            ->willReturn([]);

        $resultTransfer = $this->reader->expandCategoryWithImageSets($categoryTransfer);
        $this->assertSame($categoryTransfer, $resultTransfer);
        $this->assertEquals(0, count($categoryTransfer->getFormImageSets()));
    }

    public function testExpandCategoryWithImageSetNotEmpty()
    {
        $categoryTransfer = $this->createCategoryTransfer(1);
        $categoryImageTransfer = $this->createCategoryImageTransfer();
        $categoryImageSetTransfer = $this->createCategoryImageSetTransfer(
            1,
            $categoryTransfer->getIdCategory(),
            $categoryImageTransfer,
            $this->createLocaleTransfer()
        );
        $this->repository->method('findCategoryImageSetsByCategoryId')
            ->willReturn([$categoryImageSetTransfer]);

        $resultTransfer = $this->reader->expandCategoryWithImageSets($categoryTransfer);
        $this->assertSame($categoryTransfer, $resultTransfer);
        $this->assertEquals(1, count($resultTransfer->getFormImageSets()));
        $this->assertSame($categoryImageSetTransfer, $resultTransfer->getFormImageSets()[0]);
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\CategoryImage\Persistence\CategoryImageRepositoryInterface
     */
    protected function createRepositoryMock()
    {
        $repository = $this->getMockBuilder(CategoryImageRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        return $repository;
    }

    /**
     * @param int $idCategory
     *
     * @return \Generated\Shared\Transfer\CategoryTransfer
     */
    protected function createCategoryTransfer(int $idCategory): CategoryTransfer
    {
        $categoryTransfer = new CategoryTransfer();
        $categoryTransfer->setCategoryKey(static::CATEGORY_KEY);
        $categoryTransfer->setIdCategory($idCategory);
        $categoryTransfer->setIsActive(true);

        return $categoryTransfer;
    }

    /**
     * @param int $idCategoryImageSet
     * @param int $idCategory
     * @param CategoryImageTransfer $categoryImageTransfer
     * @param \Generated\Shared\Transfer\LocaleTransfer|null $localeTransfer
     *
     * @return \Generated\Shared\Transfer\CategoryImageSetTransfer
     */
    protected function createCategoryImageSetTransfer(
        int $idCategoryImageSet,
        int $idCategory,
        CategoryImageTransfer $categoryImageTransfer,
        LocaleTransfer $localeTransfer = null
    ): CategoryImageSetTransfer {
        $categoryImageSetTransfer = new CategoryImageSetTransfer();
        $categoryImageSetTransfer->setIdCategoryImageSet($idCategoryImageSet)
            ->setName(static::CATEGORY_IMAGE_SET_NAME)
            ->setIdCategory($idCategory)
            ->addCategoryImage($categoryImageTransfer)
            ->setLocale($localeTransfer);

        return $categoryImageSetTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\CategoryImageTransfer
     */
    protected function createCategoryImageTransfer(): CategoryImageTransfer
    {
        $categoryImageTransfer = new CategoryImageTransfer();
        $categoryImageTransfer->setExternalUrlSmall(static::CATEGORY_IMAGE_URL_SMALL)
            ->setExternalUrlLarge(static::CATEGORY_IMAGE_URL_LARGE);

        return $categoryImageTransfer;
    }

    /**
     * @param string $localeName
     *
     * @return \Generated\Shared\Transfer\LocaleTransfer
     */
    protected function createLocaleTransfer(string $localeName = 'default'): LocaleTransfer
    {
        $localeTransfer = new LocaleTransfer();
        $localeTransfer->setLocaleName($localeName);

        return $localeTransfer;
    }
}
