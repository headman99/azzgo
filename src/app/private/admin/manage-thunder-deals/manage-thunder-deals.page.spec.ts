import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ManageThunderDealsPage } from './manage-thunder-deals.page';

describe('ManageThunderDealsPage', () => {
  let component: ManageThunderDealsPage;
  let fixture: ComponentFixture<ManageThunderDealsPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManageThunderDealsPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ManageThunderDealsPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
