import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ManageAdsPage } from './manage-ads.page';

describe('ManageAdsPage', () => {
  let component: ManageAdsPage;
  let fixture: ComponentFixture<ManageAdsPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManageAdsPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ManageAdsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
