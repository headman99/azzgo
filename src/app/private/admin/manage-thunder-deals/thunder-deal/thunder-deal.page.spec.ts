import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ThunderDealPage } from './thunder-deal.page';

describe('ThunderDealPage', () => {
  let component: ThunderDealPage;
  let fixture: ComponentFixture<ThunderDealPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ThunderDealPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ThunderDealPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
