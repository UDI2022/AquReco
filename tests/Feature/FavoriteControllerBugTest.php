<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Favorite\Favorite;

class FavoriteControllerBugTest extends TestCase
{
    use DatabaseTransactions;

    public function testAddToFavorites()
    {
        // ダミーデータを作成する
        $dummyData = [
            'control_id' => 1,
            'email' => 'test@example.com',
            
        ];

        // テスト用のリクエストを送信し、レスポンスを取得する
        $response = $this->post('/api/add-to-favorites', $dummyData);

        // レスポンスの内容を検証する
        $response->assertStatus(200); // 正常なレスポンスが返されたことを確認
        $response->assertJson(['success' => true]); // JSON形式のレスポンスで、successがtrueであることを確認

        // Favoriteテーブルにデータが追加されていることを確認
        $this->assertDatabaseHas('Favorite', $dummyData);
    }
}
