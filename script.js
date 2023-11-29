
//---------------------------

document.addEventListener('DOMContentLoaded', function() {
    // IntersectionObserverのコールバック定義
    function doWhenIntersect(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // 要素がビューポートに入った時の処理
                document.querySelector('nav').classList.remove('active');
            } else {
                // 要素がビューポートから出た時の処理
                document.querySelector('nav').classList.add('active');
            }
        });
    }

    // IntersectionObserverのオプション
    const options = {
        // ここにオプションを設定
        root: null,
        rootMargin: '0px',
        threshold: 0
    };

    // 監視対象の要素を取得
    const target = document.querySelector('.corona');
    if (target) {
        const observer = new IntersectionObserver(doWhenIntersect, options);
        observer.observe(target);
    }

    // ナビゲーションメニューのリンクにイベントリスナーを設定
    document.querySelectorAll('.menu a').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
});
//----------------------------




// スクロールイベントを監視
window.addEventListener('scroll', function() {
    // 現在のスクロール位置を取得
    const scrollPosition = window.scrollY || document.documentElement.scrollTop;

    // 対象となる要素を取得
    const element = document.getElementById('yourElementId');

    if (element) {
        // スクロール位置が500px以上ならクラスを追加、未満なら削除
        if (scrollPosition >= 500) {
            element.classList.add('top');
            element.style.opacity = 1;
            element.style.transform = 'translateY(0px)';
        } else {
            element.style.opacity = 0;
            element.style.transform = 'translateY(50px)';
        }
    }
    // トップへ戻るボタンのクリックイベント
const button = document.querySelector('.top');
if (button) {
    button.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}
});



document.addEventListener('DOMContentLoaded', function() { 
    const modal = document.getElementById("loginModal");
    const btn = document.getElementById("signinButton");
    let isModalOpen = false; // モーダルが開いているかどうかのフラグ
    
      // サインインボタンがクリックされたときにモーダルを表示
      if (btn) {
          btn.onclick = function() {
              modal.style.display = "flex";
              modal.style.opacity = 1;
              modal.style.margin = 0;
              isModalOpen = true;
          }
      } 
      
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.opacity = 0;
              setTimeout(function() {
                  modal.style.display = "none";
                  isModalOpen = false;
              }, 400);
          }
      }
      
  });

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.signclick');
    const sideMenu = document.querySelector('.sideMenu');
    const modal = document.getElementById("loginModal");
    const btn = document.getElementById("signinbutton");
    let isModalOpen = false; // モーダルが開いているかどうかのフラグ
    
      // サインインボタンがクリックされたときにモーダルを表示
      if (btn) {
          btn.onclick = function() {
              modal.style.display = "flex";
              modal.style.opacity = 1;
              modal.style.margin = 0;
              isModalOpen = true;
          }
      } 
      
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.opacity = 0;
              setTimeout(function() {
                  modal.style.display = "none";
                  isModalOpen = false;
              }, 400);
          }
      }

    // メニューを開くトリガー
    menuToggle.addEventListener('click', function(event) {
        sideMenu.style.display = "block";
        event.stopPropagation(); // イベントのバブリングを停止
    });


    // ウィンドウ全体のクリックでメニューを閉じる
    window.addEventListener('click', function() {
        sideMenu.style.display = "none";
    });
});








        