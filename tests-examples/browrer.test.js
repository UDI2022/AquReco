import { test } from '@playwright/test';

test('test browser', async ({ page }) => {
  // ブラウザが起動した時に表示されるページ
  await page.goto('http://localhost:8000/');
  await page.pause();
});