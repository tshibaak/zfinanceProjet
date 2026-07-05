const heroSlides = Array.from(document.querySelectorAll('.hero-slide'));

    const header = document.querySelector('.navbar');
    const burger = document.querySelector('.burger');
    const drawer = document.getElementById('mobileDrawer');
    const backdrop = document.getElementById('drawerBackdrop');
    const drawerClose = document.getElementById('drawerClose');
    const navLinks = Array.from(document.querySelectorAll('.drawer-nav a'));
    const counters = Array.from(document.querySelectorAll('.count'));
    const serviceToggles = Array.from(document.querySelectorAll('.service-toggle'));
    const accordions = Array.from(document.querySelectorAll('.accordion-item'));
    const articleCards = Array.from(document.querySelectorAll('.article-card'));
    const articleModal = document.getElementById('articleModal');
    const modalClose = document.getElementById('modalClose');
    const modalImage = document.getElementById('modalImage');
    const modalTag = document.getElementById('modalTag');
    const modalTitle = document.getElementById('modalTitle');
    const modalDate = document.getElementById('modalDate');
    const modalContent = document.getElementById('modalContent');
    const modalSourceLink = document.getElementById('modalSourceLink');
    const contactForm = document.getElementById('contactForm');
    const formSent = document.getElementById('formSent');
    const newsletterForm = document.getElementById('newsletterForm');
    const newsletterSent = document.getElementById('newsletterSent');

    let currentHero = 0;
    let heroTimer = null;

    const articleData = {
      irpp: {
        tag: 'Réforme fiscale',
        date: 'Analyse',
        img: 'assets/news/news-irpp.jpg',
        title: "La réforme de l'Impôt sur le Revenu des Personnes Physiques (IRPP)",
        content: [
          "La réforme de l'Impôt sur le Revenu des Personnes Physiques (IRPP) s'inscrit dans la modernisation du système fiscal congolais. Elle vise à faire évoluer la manière dont sont imposés les revenus des personnes physiques.",
          "Pour les entreprises comme pour les particuliers, cette réforme appelle une vigilance accrue sur le calcul, les retenues et les déclarations. ZFINANCES accompagne ses clients dans l'analyse de ses impacts et l'adaptation de leurs pratiques.",
          "L'analyse complète des impacts et perspectives de la réforme est disponible sur la publication officielle de Deloitte, accessible via le lien source ci-dessous."
        ],
        source: 'https://www.deloitte.com/afrique/fr/services/tax/perspectives/reforme-impot-revenu-personnes-physiques.html'
      },
      facture: {
        tag: 'DGI',
        date: '12 nov. 2025',
        img: 'assets/news/news-facture.jpg',
        title: 'DGI : la réforme de la facture généralisée entre en phase finale',
        content: [
          'La Direction Générale des Impôts (DGI) annonce que la réforme de la facture généralisée — dite facture normalisée — entre dans sa phase finale de déploiement en République Démocratique du Congo.',
          "Cette réforme structurante concerne l'ensemble des opérateurs économiques et a pour objectif de fiabiliser la chaîne de facturation et de renforcer la traçabilité des transactions.",
          'Les entreprises sont invitées à anticiper leur mise en conformité. ZFINANCES peut vous accompagner dans cette transition.'
        ],
        source: 'https://www.radiookapi.net/2025/11/12/emissions/linvite-du-jour/dgi-la-reforme-de-la-facture-generalisee-entre-en-phase-finale'
      },
      modernisation: {
        tag: 'Politique fiscale',
        date: '15 sept. 2025',
        img: 'assets/news/news-modernisation.jpg',
        title: 'Modernisation du système fiscal congolais : lancement de la campagne sur deux nouveaux impôts',
        content: [
          "Dans le cadre de la modernisation du système fiscal congolais, la Première Ministre Judith Suminwa a lancé la campagne portant sur l'instauration de deux nouveaux impôts.",
          "Cette initiative gouvernementale traduit la volonté d'élargir et de moderniser l'assiette fiscale du pays.",
          "ZFINANCES suit de près ces évolutions afin d'informer et de préparer ses clients."
        ],
        source: 'https://www.primature.gouv.cd/2025/09/15/modernisation-du-systeme-fiscal-congolais-judith-suminwa-lance-la-campagne-sur-linstauration-de-deux-nouveaux-impots/'
      }
    };

    function setNavbarState() {
      header.classList.toggle('scrolled', window.scrollY > 0);
    }

    function setHero(index) {
      currentHero = (index + heroSlides.length) % heroSlides.length;
      heroSlides.forEach((slide, idx) => slide.classList.toggle('active', idx === currentHero));
    }

    function startHeroRotation() {
      clearInterval(heroTimer);
      heroTimer = setInterval(() => setHero(currentHero + 1), 5000);
    }

    function toggleDrawer(open) {
      drawer.classList.toggle('open', open);
      backdrop.classList.toggle('open', open);
      burger.setAttribute('aria-expanded', open ? 'true' : 'false');
      drawer.setAttribute('aria-hidden', !open);
      document.body.style.overflow = open ? 'hidden' : '';
    }

    function handleCount(el) {
          const target = parseInt(el.dataset.target, 10) || 0;
          const unit = el.dataset.unit || '';
          const start = performance.now();
          const duration = 1600;
          function step(now) {
            const progress = Math.min(1, (now - start) / duration);
            const value = Math.round(target * progress);
            if (unit) {
              el.textContent = `+${value}${unit}`;
            } else {
              el.textContent = target >= 100 ? `${value}%` : `+${value}`;
            }
            if (progress < 1) requestAnimationFrame(step);
            else {
              if (unit) el.textContent = `+${target}${unit}`;
              else el.textContent = target >= 100 ? `${target}%` : `+${target}`;
            }
          }
          requestAnimationFrame(step);
    }

    function setupMarqueeTrack(track, logos) {
      if (!track || !logos.length) return;
      const wrapper = track.parentElement;
      const createLogoItem = ({ src, alt }) => {
        const item = document.createElement('div');
        item.className = 'marquee-item';
        const img = document.createElement('img');
        img.src = src;
        img.alt = alt;
        item.appendChild(img);
        return item;
      };

      const fragment = document.createDocumentFragment();
      logos.forEach(logo => fragment.appendChild(createLogoItem(logo)));
      const baseItems = Array.from(fragment.childNodes);
      track.appendChild(fragment);

      const ensureTrackLength = () => {
        const trackWidth = track.scrollWidth;
        const wrapperWidth = wrapper.clientWidth;
        if (trackWidth < wrapperWidth * 2) {
          baseItems.forEach(item => track.appendChild(item.cloneNode(true)));
          return false;
        }
        return true;
      };

      while (!ensureTrackLength()) {
        // repeat cloning until the track is wide enough to avoid visible gaps
      }

      const duration = parseFloat(track.dataset.duration) || 48;
      track.style.animationDuration = `${duration}s`;
    }

    function initClientMarquee() {
      const row1 = document.getElementById('marqueeRow1');
      const row2 = document.getElementById('marqueeRow2');

      const logosRow1 = [
        { src: 'assets/logos/infobip.png', alt: 'Infobip' },
        { src: 'assets/logos/standard.png', alt: 'Standard Telecom' },
        { src: 'assets/logos/pygma.png', alt: 'Pygma Communication' },
        { src: 'assets/logos/pactilis.png', alt: 'Pactilis' },
        { src: 'assets/logos/utex.png', alt: 'UTEX' },
        { src: 'assets/logos/texaf.png', alt: 'Texaf Bilembo' },
      ];

      const logosRow2 = [
        { src: 'assets/logos/wiko.png', alt: 'Wiko' },
        { src: 'assets/logos/ascoma.png', alt: 'Ascoma' },
        { src: 'assets/logos/carrigres.png', alt: 'Carrigres' },
        { src: 'assets/logos/infobip.png', alt: 'Infobip' },
        { src: 'assets/logos/standard.png', alt: 'Standard Telecom' },
        { src: 'assets/logos/pygma.png', alt: 'Pygma Communication' },
      ];

      setupMarqueeTrack(row1, logosRow1);
      setupMarqueeTrack(row2, logosRow2);
    }

    function openArticle(id) {
      const article = articleData[id];
      if (!article) return;
      modalImage.src = article.img;
      modalImage.alt = article.title;
      modalTag.textContent = article.tag;
      modalTitle.textContent = article.title;
      modalDate.textContent = article.date;
      modalContent.innerHTML = article.content.map(p => `<p>${p}</p>`).join('');
      modalSourceLink.href = article.source;
      modalSourceLink.textContent = article.source;
      articleModal.classList.add('open');
      document.body.style.overflow = 'hidden';
    }

    function closeArticle() {
      articleModal.classList.remove('open');
      document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', () => {
      setNavbarState();
      startHeroRotation();

      window.addEventListener('scroll', setNavbarState, { passive: true });

      burger.addEventListener('click', () => toggleDrawer(true));
      drawerClose.addEventListener('click', () => toggleDrawer(false));
      backdrop.addEventListener('click', () => toggleDrawer(false));
      navLinks.forEach(link => link.addEventListener('click', () => toggleDrawer(false)));

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
            observer.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15, rootMargin: '0px 0px -80px 0px' });

      document.querySelectorAll('.fade-up').forEach(section => observer.observe(section));

      const countObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            handleCount(entry.target);
            countObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.5 });

      counters.forEach(count => countObserver.observe(count));

      // serviceToggles.forEach(toggle => {
      //   toggle.addEventListener('click', () => {
      //     const card = toggle.closest('.service-card');
      //     const details = card.querySelector('.service-details');
      //     const expanded = toggle.getAttribute('aria-expanded') === 'true';
      //     toggle.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      //     details.classList.toggle('expanded', !expanded);
      //     card.classList.toggle('open', !expanded);
      //   });
      // });
      // ---- code pour l' effet accordéon --- //

      // --- code rajouter --- //

      serviceToggles.forEach(toggle => {

          toggle.addEventListener('click', () => {

              const card = toggle.closest('.service-card');
              const details = card.querySelector('.service-details');
              const isOpen = card.classList.contains('open');

              // Ferme toutes les cartes
              serviceToggles.forEach(otherToggle => {

                  const otherCard = otherToggle.closest('.service-card');
                  const otherDetails = otherCard.querySelector('.service-details');

                  otherCard.classList.remove('open');
                  otherDetails.classList.remove('expanded');
                  otherToggle.setAttribute('aria-expanded', 'false');

              });

              // Ouvre seulement celle cliquée
              if (!isOpen) {

                  card.classList.add('open');
                  details.classList.add('expanded');
                  toggle.setAttribute('aria-expanded', 'true');

              }

          });

      });


      // accordions.forEach(item => {
      //   const button = item.querySelector('.accordion-button');
      //   const content = item.querySelector('.accordion-content');
      //   button.addEventListener('click', () => {
      //     const expanded = button.getAttribute('aria-expanded') === 'true';
      //     button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      //     item.classList.toggle('open', !expanded);
      //     content.style.maxHeight = !expanded ? `${content.scrollHeight}px` : '0';
      //   });
      // });

      accordions.forEach(item => {

          const button = item.querySelector('.accordion-button');
          const content = item.querySelector('.accordion-content');

          button.addEventListener('click', () => {

              const isOpen = item.classList.contains('open');

              // Ferme tous les accordéons
              accordions.forEach(other => {

                  other.classList.remove('open');

                  const otherButton = other.querySelector('.accordion-button');
                  const otherContent = other.querySelector('.accordion-content');

                  otherButton.setAttribute('aria-expanded', 'false');
                  otherContent.style.maxHeight = '0';

              });

              // Si celui-ci n'était pas ouvert, on l'ouvre
              if (!isOpen) {

                  item.classList.add('open');
                  button.setAttribute('aria-expanded', 'true');
                  content.style.maxHeight = `${content.scrollHeight}px`;

              }

          });

      });

      // --- code fin accordéon effet ---- //

      articleCards.forEach(card => {
        card.addEventListener('click', () => openArticle(card.dataset.article));
      });

      modalClose.addEventListener('click', closeArticle);
      articleModal.addEventListener('click', e => { if (e.target === articleModal) closeArticle(); });

      contactForm.addEventListener('submit', event => {
        event.preventDefault();
        formSent.classList.remove('is-hidden');
        contactForm.reset();
      });

      newsletterForm.addEventListener('submit', event => {
        event.preventDefault();
        newsletterSent.classList.remove('is-hidden');
        newsletterForm.reset();
      });

      initClientMarquee();
    });
