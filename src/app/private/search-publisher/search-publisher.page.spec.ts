import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { SearchPublisherPage } from './search-publisher.page';

describe('SearchPublisherPage', () => {
  let component: SearchPublisherPage;
  let fixture: ComponentFixture<SearchPublisherPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SearchPublisherPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(SearchPublisherPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
